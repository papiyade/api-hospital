<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\PrescriptionController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\CheckinController;
use App\Http\Controllers\Api\PharmacyController;
use App\Http\Controllers\Api\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Api\HomeController;

/*
|--------------------------
| AUTH
|--------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------
| PROTECTED ROUTES
|--------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

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


    // Médecin - voir ses rendez-vous
    Route::get('/doctor/appointments', [\App\Http\Controllers\Api\DoctorController::class, 'appointments']);
    Route::post('/doctor/appointments/{id}/start', [\App\Http\Controllers\Api\DoctorController::class, 'startConsultation']);
Route::post('/doctor/appointments/{id}/finish', [\App\Http\Controllers\Api\DoctorController::class, 'finishConsultation']);
Route::get('/patient/appointment/{id}/queue', [\App\Http\Controllers\Api\AppointmentController::class, 'queueStatus']);
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
    return \App\Models\Department::all();
});
Route::get('/doctors', function () {
    return \App\Models\Doctor::with('user')->get();
});

Route::get('/admin/appointments', [AdminController::class, 'appointments']);
Route::get('/admin/stats', [AdminController::class, 'stats']);

Route::prefix('admin')->group(function () {

    Route::get('/doctors', [AdminDoctorController::class, 'index']);
    Route::post('/doctors', [AdminDoctorController::class, 'store']);
    Route::put('/doctors/{id}', [AdminDoctorController::class, 'update']);
    Route::delete('/doctors/{id}', [AdminDoctorController::class, 'destroy']);

});



Route::middleware('auth:sanctum')->get('/home', [HomeController::class, 'index']);
