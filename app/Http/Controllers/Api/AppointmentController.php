<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $patient = $request->user()->patient;

        if (! $patient) {
            return response()->json([
                'message' => 'Aucun patient lié à cet utilisateur',
            ], 403);
        }

        return Appointment::with(['service', 'doctor.user'])
            ->where('patient_id', $patient->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
        ]);

        $patient = $request->user()->patient;

        if (! $patient) {
            return response()->json([
                'message' => 'Aucun patient lié à cet utilisateur',
            ], 403);
        }

        //  Empêcher doublon
        $existing = Appointment::where('patient_id', $patient->id)
            ->where('date', $request->date)
            ->first();

        if ($existing) {
            return response()->json([
                'message' => 'Vous avez déjà un rendez-vous pour cette date',
            ], 400);
        }

        //  File d'attente
        $lastQueue = Appointment::where('service_id', $request->service_id)
            ->where('date', $request->date)
            ->max('queue_number');

        $queue = $lastQueue ? $lastQueue + 1 : 1;

        //  CRÉATION DIRECTE AVEC QR
        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'queue_number' => $queue,
            'status' => 'pending',
            'qr_code' => (string) Str::uuid(), // 🔥 ICI DIRECT
        ]);

        //  IMPORTANT: charger relations + refresh
        $appointment->load(['service', 'doctor.user']);

        $service = Service::find($request->service_id);

        $patientName = $patient->user?->name ?? 'Patient';
        $phone = $patient->phone;

        $message = "Bonjour {$patientName}, "
            ."votre rendez-vous du {$request->date} au service {$service->name} "
            .'a été enregistré. Nous vous notifierons dès qu’il sera confirmé avec un médecin.';

        try {
            if ($phone) {
                SmsService::send($phone, $message);
            }
        } catch (\Throwable $e) {
            \Log::error('SMS crash: '.$e->getMessage());
        }
        \Log::info('STORE OK REACHED');

        return response()->json($appointment, 201);
    }

    public function show(Request $request, $id)
    {
        $patient = $request->user()->patient;

        if (! $patient) {
            return response()->json([
                'message' => 'Aucun patient lié à cet utilisateur',
            ], 403);
        }

        $appointment = Appointment::with(['service', 'doctor.user', 'patient'])
            ->where('patient_id', $patient->id)
            ->findOrFail($id);

        //  FILE D'ATTENTE INTELLIGENTE
        $queue = Appointment::where('doctor_id', $appointment->doctor_id)
            ->whereDate('date', $appointment->date)
            ->whereIn('status', ['checked_in', 'in_progress'])
            ->orderBy('queue_number')
            ->get();

        // position dans la file
        $position = $queue->search(fn ($a) => $a->id === $appointment->id) + 1;

        // patient en cours
        $current = $queue->firstWhere('status', 'in_progress');

        return response()->json([
            'appointment' => $appointment,

            //  NOUVEAU BLOC QUE FLUTTER VA UTILISER
            'queue' => [
                'position' => $position,
                'current_number' => $current?->queue_number,
                'called' => $appointment->status === 'in_progress',
                'patients_before' => max($position - 1, 0),
                'total' => $queue->count(),
            ],
        ]);
    }

    public function checkIn(Request $request, $id)
    {
        $patient = $request->user()->patient;

        if (! $patient) {
            return response()->json([
                'message' => 'Aucun patient lié à cet utilisateur',
            ], 403);
        }

        $appointment = Appointment::where('patient_id', $patient->id)
            ->findOrFail($id);

        //  Déjà check-in
        if ($appointment->checked_in_at) {
            return response()->json([
                'message' => 'Vous êtes déjà enregistré',
            ], 400);
        }

        //  Autoriser seulement si pending
        if ($appointment->status !== 'pending') {
            return response()->json([
                'message' => 'Ce rendez-vous ne peut pas être enregistré',
            ], 400);
        }

        $appointment->update([
            'status' => 'checked_in',
            'checked_in_at' => now(),
        ]);

        return response()->json([
            'message' => 'Check-in réussi',
            'appointment' => $appointment,
        ]);
    }
}
