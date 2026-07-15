<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function me(Request $request)
    {
        $user = $request->user();
        $patient = $user->patient;

        if (! $patient) {
            return response()->json([
                'message' => 'Aucun patient associé.',
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
                'gender' => $patient->gender,
                'blood_group' => $patient->blood_group,
                'allergies' => $patient->allergies,
                'medical_history' => $patient->medical_history,
                'emergency_contact_name' => $patient->emergency_contact_name,
                'emergency_contact_phone' => $patient->emergency_contact_phone,
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

    public function update(Request $request)
    {
        $user = $request->user();
        $patient = $user->patient;

        if (! $patient) {
            return response()->json([
                'message' => 'Aucun patient associé.',
            ], 404);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],

            'phone' => ['nullable', 'string', 'max:20'],

            'birth_date' => ['nullable', 'date'],

            'address' => ['nullable', 'string', 'max:255'],
            'gender' => [
    'nullable',
    Rule::in(['Homme','Femme']),
],

'blood_group' => [
    'nullable',
    Rule::in([
        'A+','A-',
        'B+','B-',
        'AB+','AB-',
        'O+','O-'
    ]),
],

'allergies' => [
    'nullable',
    'string',
],

'medical_history' => [
    'nullable',
    'string',
],

'emergency_contact_name' => [
    'nullable',
    'string',
    'max:255',
],

'emergency_contact_phone' => [
    'nullable',
    'string',
    'max:20',
],
        ]);

        DB::transaction(function () use ($validated, $user, $patient) {

            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
            ]);

            $patient->update([
                'phone' => $validated['phone'] ?? null,
                'birth_date' => $validated['birth_date'] ?? null,
                'address' => $validated['address'] ?? null,
                'gender' => $validated['gender'] ?? null,
                'blood_group' => $validated['blood_group'] ?? null,
                'allergies' => $validated['allergies'] ?? null,
                'medical_history' => $validated['medical_history'] ?? null,
                'emergency_contact_name'
                    => $validated['emergency_contact_name'] ?? null,
                'emergency_contact_phone'
                    => $validated['emergency_contact_phone'] ?? null,
            ]);
        });

        $user->refresh();
        $patient->refresh();

        return response()->json([
            'message' => 'Profil mis à jour avec succès.',

            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ],

            'patient' => [
                'id' => $patient->id,
                'phone' => $patient->phone,
                'birth_date' => $patient->birth_date,
                'address' => $patient->address,
                'gender' => $patient->gender,
                'blood_group' => $patient->blood_group,
                'allergies' => $patient->allergies,
                'medical_history' => $patient->medical_history,
                'emergency_contact_name' => $patient->emergency_contact_name,
                'emergency_contact_phone' => $patient->emergency_contact_phone,
            ],
        ]);
    }
}
