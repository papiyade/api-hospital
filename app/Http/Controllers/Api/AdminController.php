<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentConfirmed;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //
    public function stats()
    {
        return response()->json([
            'total_appointments' => Appointment::count(),
            'today_appointments' => Appointment::whereDate('date', now())->count(),
            'services' => Service::count(),
            'departments' => Department::count(),
            'doctors' => Doctor::count(),
        ]);
    }

    public function appointments(Request $request)
    {
        $query = Appointment::with(['service', 'doctor.user', 'patient.user']);

        if ($request->date) {
            $query->where('date', $request->date);
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    public function assignDoctor(Request $request, $id)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $appointment = Appointment::findOrFail($id);

        // ✅ Update
        $appointment->update([
            'doctor_id' => $request->doctor_id,
            'status' => 'confirmed',
        ]);

        // ✅ Charger relations
        $appointment->load('patient.user', 'doctor.user');

        // ✅ Maintenant OK
        $patientName = $appointment->patient->user->name ?? 'Patient';
        $doctorName = $appointment->doctor->user->name ?? 'Médecin';
        $email = $appointment->patient->user->email ?? null;

        // ✅ Notification (APRÈS avoir récupéré doctorName)
        Notification::create([
            'user_id' => $appointment->patient->user->id,
            'title' => 'Rendez-vous confirmé',
            'message' => "Dr. {$doctorName} vous prendra en charge le {$appointment->date}",
            'type' => 'appointment_confirmed',
        ]);

        // ✅ Mail sécurisé
        if ($email) {
            try {
                Mail::to($email)->send(
                    new AppointmentConfirmed(
                        $appointment,
                        $patientName,
                        $doctorName
                    )
                );
            } catch (\Throwable $e) {
                \Log::error('Mail confirm crash: '.$e->getMessage());
            }
        }

        return response()->json([
            'message' => 'Doctor assigned successfully',
            'appointment' => $appointment,
        ]);
    }
}
