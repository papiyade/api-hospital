<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function checkin(Request $request)
    {
        $request->validate([
            'qr_code' => 'required',
        ]);

        $appointment = Appointment::where('qr_code', $request->qr_code)->first();

        if (! $appointment) {
            return response()->json([
                'message' => 'QR code invalide',
            ], 404);
        }

        //  Empêcher double check-in
        if ($appointment->checked_in_at) {
            return response()->json([
                'message' => 'Déjà enregistré',
            ], 400);
        }

        //  Autoriser seulement si pending
        if (! in_array($appointment->status, ['pending', 'confirmed'])) {
            return response()->json([
                'message' => 'Rendez-vous non valide pour check-in',
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
