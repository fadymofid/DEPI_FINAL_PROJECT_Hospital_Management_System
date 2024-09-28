<?php

use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MedicineController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;


//Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
//
//Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Protected routes for doctors
Route::middleware(['auth:sanctum', 'language'])->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index']);
    Route::post('/doctors', [DoctorController::class, 'store']);
    Route::get('/doctors/{id}', [DoctorController::class, 'show']);
    Route::put('/doctors/{id}', [DoctorController::class, 'update']);
    Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);
    Route::get('/doctors/search', [DoctorController::class, 'searchDoctor']);
    Route::get('/doctors/appointments', [DoctorController::class, 'getDoctorsWithAppointments']);



    // Protected routes for medicines
    Route::get('/medicines', [MedicineController::class, 'index']);
    Route::post('/medicines', [MedicineController::class, 'store']);
    Route::get('/medicines/{id}', [MedicineController::class, 'show']);
    Route::put('/medicines/{id}', [MedicineController::class, 'update']);
    Route::delete('/medicines/{id}', [MedicineController::class, 'destroy']);
    Route::get('/medicines/search', [MedicineController::class, 'searchMedicine']);



    // Protected routes for appointments

        Route::get('/appointments', [AppointmentController::class, 'index']);
        Route::post('/appointments', [AppointmentController::class, 'store']);
        Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
        Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
        Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);
        Route::put('/appointments/{id}/approve', [AppointmentController::class, 'approve']);
        Route::get('/appointments/search', [AppointmentController::class, 'searchAppointments']);



// User routes
    Route::get('/users', [ApiUserController::class, 'index']);
    Route::post('/users', [ApiUserController::class, 'store']);
    Route::get('/users/{id}', [ApiUserController::class, 'show']);
    Route::put('/users/{id}', [ApiUserController::class, 'update']);
    Route::delete('/users/{id}', [ApiUserController::class, 'destroy']);
    Route::get('/users/search', [ApiUserController::class, 'search']);


    Route::get('/api/doctor-appointments', [DoctorController::class, 'getDoctorsWithAppointments']);

});

