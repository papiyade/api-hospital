<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Medication;
use App\Models\Prescription;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'pdf_url' => $prescription->pdf_path
            ? asset('storage/' . $prescription->pdf_path)
            : null,
        ]);
    }

public function sign($id, Request $request)
{
    try {

        $prescription = Prescription::with([
            'consultation.appointment.patient.user',
            'consultation.appointment.doctor.user',
            'medications'
        ])->findOrFail($id);

        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $doctor = $user->doctor;

        if (!$doctor) {
            return response()->json([
                'message' => 'Doctor not found for this user',
                'user_id' => $user->id
            ], 400);
        }

        if (!$doctor->signature) {
            return response()->json([
                'message' => 'Signature manquante'
            ], 400);
        }

        $pdf = Pdf::loadView('pdf.prescription', [
            'prescription' => $prescription,
            'doctor' => $doctor,
            'signature' => public_path('storage/' . $doctor->signature),
        ]);

        $fileName = 'prescriptions/prescription_'.$prescription->id.'.pdf';

        Storage::disk('public')->put($fileName, $pdf->output());

        $prescription->update([
            'status' => 'dispensed',
            'pdf_path' => $fileName,
            'signed' => 1,
        ]);

        return response()->json([
            'message' => 'OK',
            'pdf_url' => asset('storage/'.$fileName),
        ]);

    } catch (\Throwable $e) {

        return response()->json([
            'message' => 'Server error',
            'error' => $e->getMessage(),
            'line' => $e->getLine(),
        ], 500);
    }
}

    public function generatePdf($id)
    {
        $prescription = Prescription::with([
            'consultation.appointment.patient.user',
            'consultation.appointment.doctor.user',
            'medications',
        ])->findOrFail($id);

        $doctor = $prescription->consultation->appointment->doctor->user->doctor;

        if (! $doctor) {
            return response()->json([
                'message' => 'Médecin introuvable',
            ], 404);
        }

        // signature
        $signaturePath = $doctor->signature
            ? asset('storage/'.$doctor->signature)
            : null;

        // PDF
        $pdf = Pdf::loadView('pdf.prescription', [
            'prescription' => $prescription,
            'doctor' => $doctor,
            'signature' => $signaturePath,
        ]);

        $fileName = 'prescriptions/prescription_'.$prescription->id.'.pdf';

        Storage::disk('public')->put($fileName, $pdf->output());

        $prescription->update([
            'pdf_path' => $fileName,
        ]);

        return response()->json([
            'message' => 'PDF généré avec succès',
            'pdf_url' => asset('storage/'.$fileName),
        ]);
    }
}
