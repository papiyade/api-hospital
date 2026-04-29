<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

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
            ->whereIn('status', ['checked_in']) // 👈 uniquement ceux à traiter
            ->orderBy('queue_number')
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
}
