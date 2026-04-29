<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $patient = $user->patient;

        if (! $patient) {
            return response()->json([
                'message' => 'Patient introuvable',
            ], 404);
        }

        $appointments = Appointment::with(['doctor.user'])
            ->where('patient_id', $patient->id)
            ->get();

        $total = $appointments->count();
        $pending = $appointments->whereIn('status', ['pending', 'confirmed'])->count();
        $done = $appointments->where('status', 'done')->count();

        $next = $appointments
            ->whereIn('status', ['pending', 'confirmed', 'checked_in'])
            ->sortBy('date')
            ->first();

        return response()->json([
            'appointments' => $appointments,
            'services_count' => Service::count(),
            'stats' => [
                'total' => $total,
                'pending' => $pending,
                'done' => $done,
            ],
            'next_appointment' => $next,
        ]);
    }
}
