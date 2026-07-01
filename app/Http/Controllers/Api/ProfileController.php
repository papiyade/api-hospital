<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(Request $request)
    {
        $user = $request->user();
        $patient = $user->patient;

        if (!$patient) {
            return response()->json([
                'message' => 'Aucun patient associé.'
            ], 404);
        }

        $appointments = Appointment::query()
            ->where('patient_id', $patient->id);

        // Prochain rendez-vous
        $nextAppointment = Appointment::with('service')
            ->where('patient_id', $patient->id)
            ->whereDate('date', '>=', today())
            ->whereNotIn('status', ['done', 'cancelled'])
            ->orderBy('date')
            ->orderBy('time')
            ->first();

        return response()->json([

            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'created_at' => $user->created_at,
            ],

            'patient' => [
                'id' => $patient->id,
                'phone' => $patient->phone,
                'birth_date' => $patient->birth_date,
                'address' => $patient->address,
            ],

            'stats' => [
                'total_appointments' => (clone $appointments)->count(),

                'pending' => (clone $appointments)
                    ->where('status', 'pending')
                    ->count(),

                'confirmed' => (clone $appointments)
                    ->where('status', 'confirmed')
                    ->count(),

                'checked_in' => (clone $appointments)
                    ->where('status', 'checked_in')
                    ->count(),

                'done' => (clone $appointments)
                    ->where('status', 'done')
                    ->count(),

                'cancelled' => (clone $appointments)
                    ->where('status', 'cancelled')
                    ->count(),
            ],

            'next_appointment' => $nextAppointment ? [
                'id' => $nextAppointment->id,
                'date' => $nextAppointment->date,
                'time' => $nextAppointment->time,
                'queue_number' => $nextAppointment->queue_number,
                'status' => $nextAppointment->status,
                'service' => $nextAppointment->service?->name,
            ] : null,

        ]);
    }
}
