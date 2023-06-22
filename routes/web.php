<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\skbpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ValidasiController;

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
    return view('welcome');
});


Route::get('/login', function () {
    return view('mahasiswa.login.login');
});

Route::get('/loginAdmin', function () {
    return view('admin.login.login');
});



//Route Jalur Milik Mahasiswa
Route::get('/mahasiswa', function () {
    return view('mahasiswa.dashboard');
});

//Route Jalur milik Admin
Route::get('/admin', function () {
    return view('admin.dashboard');
});


// Route::post('/login', 'AuthController@login')->name('login');


Route::get('/validasiSkbp/{id}',[ValidasiController::class,'show']);
Route::post('/validasiSkbp/update/{id}',[ValidasiController::class,'update']);
Route::get('/status', [skbpController::class, 'status'])->name('skbp.status');
Route::get('/list', [SkbpController::class, 'list']);
Route::get('/validasi/{id}', [SkbpController::class, 'validasi'])->name('validasi');
// Route::get('/validasiSkbp',[validasiController::class,'edit'])->name('validasiskbp.edit');
Route::post('/lapor', [skbpController::class, 'lapor']);
Route::get('/lapor', [skbpController::class, 'lapor']);

Route::post('/skbp/upload', [SkbpController::class, 'upload'])->name('skbp.upload');
// Route::post('/skbp/status', [SkbpController::class, 'status'])->name('status.upload');
Route::get('/skbp/status', [SkbpController::class, 'status'])->name('status');

Route::post('/riwayat', [SkbpController::class, 'riwayat']);
Route::get('/riwayat', [SkbpController::class, 'riwayat']);
Route::get('/riwayat', [skbpController::class, 'riwayat'])->name('mahasiswa.riwayat');


Route::get('/download-skbp/{id}/{file}', 'skbpController@download')->name('skbp.download');
