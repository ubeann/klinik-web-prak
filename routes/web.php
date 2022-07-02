<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\About;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Category;

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

Route::get('/', function () {
    return view('layout.maintemplate',[
        "title" => "Home"
    ]);
})->name('home');

Route::get('/about', function () {
    return view('layout.about',[
        "title" => "About"
    ]);
});

Route::get('/doctors', function () {
    return view('layout.doctors');
});

Route::get('/admin', function () {
    return view('admin.admin',[
        "title" => "Dashboard"
    ]);
});

Route::get('/admin/pendaftaran', function () {
    return view('admin.pendaftaran',[
        "title" => "Pendaftaran"
    ]);
});

Route::get('/admin/pemeriksaan', function () {
    return view('admin.pemeriksaan.pemeriksaan',[
        "title" => "Pendaftaran"
    ]);
});
Route::get('/admin/pemeriksaan/add', function () {
    return view('admin.pemeriksaan.addPemeriksaan',[
        "title" => "Pendaftaran"
    ]);
});

Route::get('/signIn', function () {
    return view('auth.signInPasien');
});

Route::get('/signUp', function () {
    return view('auth.signUpPasien');
});

Route::get('/appointment', [PendaftaranController::class, 'create']);
Route::post('/appointment', [PendaftaranController::class, 'store']);

Route::get('/admin/pasien', [PasienController::class, 'index']);
Route::get('/admin/pasien/add', [PasienController::class, 'create']);
Route::post('/admin/pasien/add', [PasienController::class, 'store']);
Route::get('/admin/pasien/edit-{id}', [PasienController::class, 'edit']);
Route::put('/admin/pasien/update-pasien-{id}', [PasienController::class, 'update']);
Route::get('/admin/pasien/delete-{id}', [PasienController::class, 'destroy']);


Route::get('/admin/dokter', [DokterController::class, 'index']);
Route::get('/admin/dokter/add', [DokterController::class, 'create']);
Route::get('/admin/dokter/edit-{id}', [DokterController::class, 'edit']);
Route::put('/admin/dokter/update-dokter-{id}', [DokterController::class, 'update']);
Route::post('/admin/dokter/add', [DokterController::class, 'store']);
Route::get('/admin/dokter/delete-{id}', [DokterController::class, 'destroy']);

Route::get('/register', function(){
    return view('auth.adminSignUp');
});

Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/login', function(){
    return view('auth.adminLogin');
})->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate'])->name('login');
Route::post('/logout', [UserController::class, 'logout']);
/* 

Route::get('/admin/pemeriksaan', [PemeriksaanController::class, 'index']);
Route::get('/admin/pemeriksaan/add', [PemeriksaanController::class, 'create']);
Route::post('/admin/pemeriksaan/add', [PemeriksaanController::class, 'store']); */
