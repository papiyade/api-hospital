<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentCreated;
use App\Models\Appointment;
use App\Models\Notification;
use App\Models\Service;
use App\Services\SmsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Log;

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
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
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
            ->where('time', $request->time)
            ->first();

        if ($existing) {
            return response()->json([
                'message' => 'Vous avez déjà un rendez-vous pour cette date et cette heure',
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
            'time' => $request->time,
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
            ."votre rendez-vous du {$request->date} à {$request->time} au service {$service->name} "
            .'a été enregistré. Nous vous notifierons dès qu’il sera confirmé avec un médecin.';

// FORMAT NUMÉRO + ENVOI SMS
if ($phone) {
    $phone = preg_replace('/[^0-9+]/', '', $phone);

    if (!str_starts_with($phone, '+')) {
        $phone = '+221' . ltrim($phone, '0');
    }

    if (!empty($phone)) {
        try {
            SmsServices::send($phone, $message);
        } catch (\Throwable $e) {
            Log::error("SMS ERROR: " . $e->getMessage());
        }
    }
}
        $user = $patient->user;

        if ($user && $user->email) {
            Mail::to($user->email)->send(
                new AppointmentCreated(
                    $appointment,
                    $patientName,
                    $service->name
                )
            );
        }
        Notification::create([
            'user_id' => $patient->user->id,
            'title' => 'Rendez-vous créé',
            'message' => "Votre rendez-vous du {$request->date} à {$request->time} a été enregistré",
            'type' => 'appointment_created',
        ]);

        return response()->json([
            'message' => 'Rendez-vous créé',
            'appointment' => $appointment,
        ], 201);
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
