<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function appointments(Request $request)
    {
        $doctor = $request->user()->doctor;

        if (! $doctor) {
            return response()->json([
                'message' => 'No doctor profile linked',
            ], 403);
        }

        $appointments = Appointment::with(['patient.user', 'service'])
            ->where('doctor_id', $doctor->id)
            // ->whereIn('status', ['checked_in']) // 👈 uniquement ceux à traiter
            ->orderBy('queue_number')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($appointments);
    }

    public function startConsultation($id)
    {
        $doctor = request()->user()->doctor;

        $appointment = Appointment::where('doctor_id', $doctor->id)
            ->where('id', $id)
            ->firstOrFail();

        $appointment->update([
            'status' => 'in_progress',
        ]);

        return response()->json([
            'message' => 'Consultation commencée',
            'appointment' => $appointment,
        ]);
    }

    public function finishConsultation($id)
    {
        $doctor = request()->user()->doctor;

        $appointment = Appointment::where('doctor_id', $doctor->id)
            ->where('id', $id)
            ->firstOrFail();

        $appointment->update([
            'status' => 'done',
        ]);

        return response()->json([
            'message' => 'Consultation terminée',
            'appointment' => $appointment,
        ]);
    }

    public function uploadSignature(Request $request)
    {
        $request->validate([
            'signature' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $doctor = $request->user()->doctor;

        if (! $doctor) {
            return response()->json(['message' => 'Vous n\'êtes pas un médecin'], 403);
        }

        // Supprimer ancienne signature si existe
        if ($doctor->signature) {
            Storage::delete($doctor->signature);
        }

        // Stocker nouvelle signature
        $path = $request->file('signature')->store('signatures', 'public');

        $doctor->update([
            'signature' => $path,
        ]);

        return response()->json([
            'message' => 'Signature enregistrée',
            'signature_url' => asset('storage/'.$path),
        ]);
    }
}
