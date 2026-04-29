<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function byAppointment($id)
    {
        $consultation = Consultation::with(['patient', 'doctor', 'service'])
            ->where('appointment_id', $id)
            ->first();

        return response()->json($consultation);
    }

    public function show($id)
    {
        return Consultation::with(['patient', 'doctor', 'service'])
            ->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'diagnosis' => 'required',
            'notes' => 'nullable',
        ]);

        $doctor = $request->user()->doctor;

        if (! $doctor) {
            return response()->json([
                'message' => 'No doctor profile linked',
            ], 403);
        }

        $appointment = Appointment::findOrFail($request->appointment_id);

        if (! in_array($appointment->status, ['checked_in', 'in_progress'])) {
            return response()->json([
                'message' => 'Une consultation ne peut être créée que pour un rendez-vous en cours',
            ], 400);
        }

        $consultation = Consultation::create([
            'appointment_id' => $appointment->id,
            'patient_id' => $appointment->patient_id,
            'doctor_id' => $doctor->id,
            'service_id' => $appointment->service_id,
            'diagnosis' => $request->diagnosis,
            'notes' => $request->notes,
        ]);

        // update appointment
        $appointment->update([
            'status' => 'done',
        ]);

        return response()->json([
            'message' => 'Consultation created successfully',
            'consultation' => $consultation,
        ]);
    }
}
