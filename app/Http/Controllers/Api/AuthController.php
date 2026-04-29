<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'nullable|string|unique:patients,phone',
            'password' => 'required|min:6',
            'address' => 'nullable|string',
        ]);

        if (! $request->email && ! $request->phone) {
            return response()->json([
                'message' => 'Email ou téléphone requis',
            ], 422);
        }

        $email = $request->email ?? ($request->phone.'@phone.local');

        $user = User::create([
            'name' => $request->name,
            'email' => $email,
            'password' => bcrypt($request->password),
            'role' => 'patient',
        ]);

        $patient = Patient::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        //  IMPORTANT : charger relation
        $user->load('patient');

        return response()->json([
            'message' => 'Compte créé',
            'user' => $user,
            'token' => $user->createToken('siigh-token')->plainTextToken,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'identifier' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $identifier = $request->identifier ?? $request->email;

        if (! $identifier) {
            return response()->json([
                'message' => 'Email ou téléphone requis',
            ], 422);
        }

        $user = User::where('email', $identifier)
            ->orWhereHas('patient', function ($q) use ($identifier) {
                $q->where('phone', $identifier);
            })
            ->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Identifiants invalides',
            ], 401);
        }

        //  charger patient
        $user->load('patient');

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'role' => $user->role,
            'token' => $user->createToken('siigh-token')->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken();

        if ($token) {
            $token->delete();
        }

        return response()->json([
            'message' => 'Déconnecté avec succès',
        ]);
    }
}
