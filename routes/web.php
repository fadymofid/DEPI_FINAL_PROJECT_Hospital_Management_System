<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Language;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/home',[HomeController::class,'redirect'])->name('home');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




Route::middleware('changeLang')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'redirect'])->name('home');



    Route::get('search_user', [UserController::class, 'search'])->name('users.search');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::get('edit_user/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('delete_user/{id}', [UserController::class, 'delete'])->name('users.delete');




    Route::post('/appointment', [AppointmentController::class, 'store']);
    Route::get('/myAppointments', [AppointmentController::class, 'index']);
    Route::post('/cancel/{id}', [AppointmentController::class, 'destroy']);
    Route::get('/showAppointments', [AppointmentController::class, 'index']);
    Route::post('/approve/{id}', [AppointmentController::class, 'approve']);
    Route::post('/cancel_appoint/{id}', [AppointmentController::class, 'destroy']);
    Route::get('search_appointments', [AppointmentController::class, 'searchAppointments']);



    Route::get('/add_doctor_view', [DoctorController::class, 'create']);
    Route::post('/upload_doctor', [DoctorController::class, 'store']);
    Route::get('/viewDocs', [DoctorController::class, 'index']);
    Route::get('/showDoctors', [DoctorController::class, 'index']);
    Route::post('/delete_doc/{id}', [DoctorController::class, 'destroy']);
    Route::get('/update_doc/{id}', [DoctorController::class, 'updateDoctor']);
    Route::post('/edit_doc/{id}', [DoctorController::class, 'update'])->name('update');
    Route::get('search_doctor', [DoctorController::class, 'searchDoctor']);
    Route::get('/api/doctor-appointments', [DoctorController::class, 'getDoctorsWithAppointments']);



    Route::get('/med', [MedicineController::class, 'index']);
    Route::post('/upload_medicine', [MedicineController::class, 'store'])->name('upload_medicine');
    Route::get('/add_med', [MedicineController::class, 'create']);
    Route::get('/showMed', [MedicineController::class, 'index']);
    Route::get('/update_medicine/{id}', [MedicineController::class, 'edit']);
    Route::post('/edit_medicine/{id}', [MedicineController::class, 'update']);
    Route::post('delete_medicine/{id}', [MedicineController::class, 'destroy'])->name('delete_medicine');
    Route::get('/search_medicine', [MedicineController::class, 'searchMedicine'])->name('search.medicine');

});


Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, config('app.available_locales'))) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }

    return redirect()->back(); // Redirect to the previous page
})->name('changeLang');

