<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

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
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $appointment->update([
            'doctor_id' => $request->doctor_id,
            'status' => 'confirmed',
        ]);

        return response()->json([
            'message' => 'Doctor assigned successfully',
            'appointment' => $appointment,
        ]);
    }
}
