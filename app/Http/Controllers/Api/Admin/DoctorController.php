<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    // =====================
    // LIST
    // =====================
    public function index()
    {
        return Doctor::with(['user', 'service'])->latest()->get();
    }

    // =====================
    // CREATE
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'service_id' => 'required|exists:services,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'doctor',
        ]);

        $doctor = Doctor::create([
            'user_id' => $user->id,
            'service_id' => $request->service_id,
        ]);

        return response()->json([
            'message' => 'Doctor created',
            'doctor' => $doctor->load(['user', 'service'])
        ], 201);
    }

    // =====================
    // UPDATE
    // =====================
    public function update(Request $request, $id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email',
            'service_id' => 'sometimes|exists:services,id',
        ]);

        if ($request->name) {
            $doctor->user->update(['name' => $request->name]);
        }

        if ($request->email) {
            $doctor->user->update(['email' => $request->email]);
        }

        if ($request->service_id) {
            $doctor->update(['service_id' => $request->service_id]);
        }

        return response()->json([
            'message' => 'Doctor updated',
            'doctor' => $doctor->load(['user', 'service'])
        ]);
    }

    // =====================
    // DELETE
    // =====================
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return response()->json([
            'message' => 'Doctor deleted'
        ]);
    }
}
