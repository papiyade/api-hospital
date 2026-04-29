<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PharmacyTransaction;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    //  SCAN QR OR VIEW PRESCRIPTION
    public function showByQr(Request $request)
    {
        $request->validate([
            'qr_code' => 'required',
        ]);

        $prescription = Prescription::with('medications')
            ->where('qr_code', $request->qr_code)
            ->first();

        if (! $prescription) {
            return response()->json(['message' => 'Ordonnance introuvable'], 404);
        }

        return response()->json($prescription);
    }

    // 💰 PAYMENT
    public function pay(Request $request, $id)
    {
        $prescription = Prescription::findOrFail($id);

        if ($prescription->status !== 'pending') {
            return response()->json([
                'message' => 'Déjà traité',
            ], 400);
        }

        $prescription->update([
            'status' => 'paid',
        ]);

        PharmacyTransaction::create([
            'prescription_id' => $prescription->id,
            'status' => 'paid',
            'total_amount' => $request->total_amount ?? 0,
        ]);

        return response()->json([
            'message' => 'Paiement validé',
            'prescription' => $prescription->load('medications'),
        ]);
    }

    //  DISPENSE MEDICATION
    public function dispense($id)
    {
        $prescription = Prescription::findOrFail($id);

        if ($prescription->status !== 'paid') {
            return response()->json([
                'message' => 'Paiement requis avant délivrance',
            ], 400);
        }

        $prescription->update([
            'status' => 'dispensed',
        ]);

        return response()->json([
            'message' => 'Médicaments délivrés',
            'prescription' => $prescription,
        ]);
    }
}
