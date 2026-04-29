<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'consultation_id' => 'required|exists:consultations,id',
            'medications' => 'required|array|min:1',
            'medications.*.name' => 'required|string',
            'medications.*.dosage' => 'nullable|string',
            'medications.*.frequency' => 'nullable|string',
            'medications.*.duration' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            $consultation = Consultation::findOrFail($request->consultation_id);

            $prescription = Prescription::create([
                'consultation_id' => $consultation->id,
                'notes' => $request->notes ?? null,
                'status' => 'pending',
            ]);

            foreach ($request->medications as $med) {

                if (empty($med['name'])) {
                    throw new \Exception('Nom médicament manquant');
                }

                // IMPORTANT: clean name
                $medication = Medication::firstOrCreate(
                    ['name' => trim($med['name'])],
                    ['stock' => 0]
                );

                // IMPORTANT: attach SAFE
                $prescription->medications()->attach($medication->id, [
                    'dosage' => $med['dosage'] ?? 'Non précisé',
                    'frequency' => $med['frequency'] ?? 'Non précisé',
                    'duration' => $med['duration'] ?? 'Non précisé',
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Prescription créée avec succès',
                'prescription' => $prescription->load('medications'),
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Erreur création prescription',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 500);
        }
    }

    public function byAppointment($id)
    {
        $consultation = Consultation::where('appointment_id', $id)->first();

        if (! $consultation) {
            return response()->json([
                'message' => 'No consultation found',
            ], 404);
        }

        $prescription = Prescription::with('medications')
            ->where('consultation_id', $consultation->id)
            ->first();

        if (! $prescription) {
            return response()->json([
                'message' => 'No prescription found',
            ], 404);
        }

        return response()->json([
            'consultation' => $consultation,
            'prescription' => $prescription,
        ]);
    }
}
