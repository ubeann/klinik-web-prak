<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;

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

// Guest Area
Route::get('/', [GuestController::class, 'landing'])->name('landing');
Route::get('admin', [GuestController::class, 'admin'])->name('admin');

// Patient Routes
Route::group(['as' => 'patient.'], function () {
    // Must be Guest
    Route::group(['middleware' => ['guest']], function () {
        // Login
        Route::group(['as' => 'login.', 'prefix' => 'login'], function () {
            Route::get('/', [GuestController::class, 'formLogin'])->name('form');
            Route::post('/', [PatientController::class, 'login'])->name('submit');
        });

        // Register
        Route::group(['as' => 'register.', 'prefix' => 'register'], function () {
            Route::get('/', [GuestController::class, 'formRegister'])->name('form');
            Route::post('/', [PatientController::class, 'register'])->name('submit');
        });
    });

    // Must be Patient
    Route::group(['middleware' => ['auth:patient']], function () {
        // Dashboard
        Route::group(['as' => 'dashboard.registration.', 'prefix' => 'dashboard/registration'], function () {
            // Registration
            Route::get('/', [PatientController::class, 'registration'])->name('index');
            Route::get('create', [RegistrationController::class, 'create'])->name('create');
            Route::post('submit', [RegistrationController::class, 'store'])->name('store');
        });

        // Logout
        Route::get('logout', [PatientController::class, 'logout'])->name('logout');
    });
});

// Admin Routes
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    // Must be Guest (Merge Login Portal)
    // Route::group(['middleware' => ['guest']], function () {
    //     // Login
    //     Route::group(['as' => 'login.', 'prefix' => 'login'], function () {
    //         Route::get('/', [GuestController::class, 'formAdmin'])->name('form');
    //         Route::post('/', [UserController::class, 'login'])->name('submit');
    //     });
    // });

    // Must be Admin
    Route::group(['middleware' => ['auth:admin']], function () {
        // Dashboard
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        // Doctor
        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/', [DoctorController::class, 'index'])->name('index');
            Route::get('create', [DoctorController::class, 'create'])->name('create');
            Route::post('store', [DoctorController::class, 'store'])->name('store');
            Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [DoctorController::class, 'update'])->name('update');
            Route::get('delete/{id}', [DoctorController::class, 'delete'])->name('delete');
        });

        // Patient
        Route::group(['as' => 'patient.', 'prefix' => 'patient'], function () {
            Route::get('/', [PatientController::class, 'index'])->name('index');
            Route::get('create', [PatientController::class, 'create'])->name('create');
            Route::post('store', [PatientController::class, 'store'])->name('store');
            Route::get('edit/{id}', [PatientController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [PatientController::class, 'update'])->name('update');
            Route::get('delete/{id}', [PatientController::class, 'delete'])->name('delete');
        });

        // Registration
        Route::group(['as' => 'registration.', 'prefix' => 'registration'], function () {
            Route::get('/', [RegistrationController::class, 'index'])->name('index');
            Route::post('update/{id}', [RegistrationController::class, 'update'])->name('update');
        });

        // Inspection
        Route::group(['as' => 'inspection.', 'prefix' => 'inspection'], function () {
            Route::get('/', [InspectionController::class, 'index'])->name('index');
            Route::get('create', [InspectionController::class, 'create'])->name('create');
            Route::post('store', [InspectionController::class, 'store'])->name('store');
            Route::get('edit/{id}', [InspectionController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [InspectionController::class, 'update'])->name('update');
            Route::get('delete/{id}', [InspectionController::class, 'delete'])->name('delete');
        });

        // Payment
        Route::group(['as' => 'payment.', 'prefix' => 'payment'], function () {
            Route::get('/', [InspectionController::class, 'payment'])->name('index');
        });

        // Logout
        Route::get('logout', [UserController::class, 'logout'])->name('logout');
    });
});
