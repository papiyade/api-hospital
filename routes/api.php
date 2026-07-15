<?php

use App\Http\Controllers\Api\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckinController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PharmacyController;
use App\Http\Controllers\Api\PharmacyPosController;
use App\Http\Controllers\Api\PharmacyProductController;
use App\Http\Controllers\Api\PrescriptionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ServiceController;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------
| AUTH
|--------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------
| PROTECTED ROUTES
|--------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile/me', [ProfileController::class, 'me']);
    Route::put('/profile/update', [ProfileController::class, 'update']);

    Route::post('/checkin', [CheckinController::class, 'checkin']);
    Route::post('/appointments/{id}/checkin', [AppointmentController::class, 'checkIn']);

    // Services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::apiResource('/admin/services', ServiceController::class);

    // Appointments
    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::post('/appointments', [AppointmentController::class, 'store']);
    Route::get('/appointments/{id}', [AppointmentController::class, 'show']);

    // Consultation
    Route::get('/consultations/{id}', [ConsultationController::class, 'show']);
    Route::post('/consultations', [ConsultationController::class, 'store']
    );
    Route::get(
        '/consultations/appointment/{id}',
        [ConsultationController::class, 'byAppointment']
    );

    // Prescription
    Route::post('/prescriptions', [PrescriptionController::class, 'store']);
    Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show']);

    // Médecin signature
    Route::post('/doctor/signature', [DoctorController::class, 'uploadSignature']);
    Route::post('/prescriptions/{id}/sign', [PrescriptionController::class, 'sign']);
    Route::post('/prescriptions/{id}/pdf', [PrescriptionController::class, 'generatePdf']);
    // Médecin - voir ses rendez-vous
    Route::get('/doctor/appointments', [DoctorController::class, 'appointments']);
    Route::post('/doctor/appointments/{id}/start', [DoctorController::class, 'startConsultation']);
    Route::post('/doctor/appointments/{id}/finish', [DoctorController::class, 'finishConsultation']);
    Route::get('/patient/appointment/{id}/queue', [AppointmentController::class, 'queueStatus']);
    // Créer consultation
    // Route::post('/consultations', [\App\Http\Controllers\Api\ConsultationController::class, 'store']);

    Route::post('/admin/appointments/{id}/assign', [AdminController::class, 'assignDoctor']);

    // PHARMACY
    Route::post('/pharmacy/scan', [PharmacyController::class, 'showByQr']);
    Route::post('/pharmacy/prescriptions/{id}/pay', [PharmacyController::class, 'pay']);
    Route::post('/pharmacy/prescriptions/{id}/dispense', [PharmacyController::class, 'dispense']);

    // =========================
    // PRESCRIPTION BY APPOINTMENT
    // =========================
    Route::get(
        '/appointments/{id}/prescription',
        [PrescriptionController::class, 'byAppointment']
    );
});
Route::get('/departments', function () {
    return Department::all();
});
Route::get('/doctors', function () {
    return Doctor::with('user')->get();
});

Route::get('/admin/appointments', [AdminController::class, 'appointments']);
Route::get('/admin/stats', [AdminController::class, 'stats']);

Route::prefix('admin')->group(function () {

    Route::get('/doctors', [AdminDoctorController::class, 'index']);
    Route::post('/doctors', [AdminDoctorController::class, 'store']);
    Route::put('/doctors/{id}', [AdminDoctorController::class, 'update']);
    Route::delete('/doctors/{id}', [AdminDoctorController::class, 'destroy']);

});

// ================= PHARMACY STOCK =================

Route::get('/pharmacy/products', [PharmacyProductController::class, 'index']);

Route::post('/pharmacy/products', [PharmacyProductController::class, 'store']);

Route::get('/pharmacy/products/{id}', [PharmacyProductController::class, 'show']);

Route::post('/pharmacy/products/{id}', [PharmacyProductController::class, 'update']);

Route::delete('/pharmacy/products/{id}', [PharmacyProductController::class, 'destroy']);

// ================= PHARMACY POS =================

Route::post('/pharmacy/checkout', [PharmacyPosController::class, 'checkout']);

Route::get('/pharmacy/sales', [PharmacyPosController::class, 'sales']);

Route::middleware('auth:sanctum')->get('/notifications', function (Request $request) {
    return Notification::where('user_id', $request->user()->id)
        ->latest()
        ->get();
});
Route::post('/notifications/{id}/read', function ($id) {
    $notification = Notification::findOrFail($id);
    $notification->update(['read' => true]);

    return response()->json(['success' => true]);
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/home', [HomeController::class, 'index']);
