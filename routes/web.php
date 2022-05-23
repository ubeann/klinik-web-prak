<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\About;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
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
});

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

Route::get('/admin/pasien/edit', function () {
    return view('admin.editPasien',[
        "title" => "Pasien"
    ]);
});

Route::get('/admin/pendaftaran', function () {
    return view('admin.pendaftaran',[
        "title" => "Pendaftaran"
    ]);
});

Route::get('/admin/pasien', [PasienController::class, 'index']);
Route::get('/admin/pasien/add', [PasienController::class, 'create']);
Route::post('/admin/pasien/add', [PasienController::class, 'store']);

Route::get('/admin/dokter', [AdminController::class, 'index']);
Route::get('/admin/dokter/add', [AdminController::class, 'create']);
Route::get('/admin/dokter/edit-{id}', [AdminController::class, 'edit']);
Route::put('/admin/dokter/update-dokter-{id}', [AdminController::class, 'update']);
Route::post('/admin/dokter/add', [AdminController::class, 'store']);
Route::get('/admin/dokter/delete-{id}', [AdminController::class, 'destroy']);
