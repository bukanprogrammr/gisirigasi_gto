<?php

use App\Models\Jaringan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\DMasaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SawahController;
use App\Http\Controllers\DSawahController;
use App\Http\Controllers\BendungController;
use App\Http\Controllers\KabkotaController;
use App\Http\Controllers\DBendungController;
use App\Http\Controllers\DirigasiController;
use App\Http\Controllers\DKabkotaController;
use App\Http\Controllers\JaringanController;
use App\Http\Controllers\DDirigasiController;
use App\Http\Controllers\DJaringanController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ChangePasswordController;
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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//crud
Route::resource('/admin/dirigasis', DDirigasiController::class)->middleware('auth');
Route::resource('/admin/kabkotas', DKabkotaController::class)->middleware('auth');
Route::resource('/admin/bendungs', DBendungController::class)->middleware('auth');
Route::resource('/admin/sawahs', DSawahController::class)->middleware('auth');
Route::resource('/admin/jaringans', DJaringanController::class)->middleware('auth');
Route::resource('/admin/masyarakats', DMasaController::class)->middleware('auth');


Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password.form');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');

//halaman utama
Route::get('/dirigasi', [MainController::class, 'maindirigasi']);
Route::get('/dirigasi/detail/{dirigasi:id}', [MainController::class, 'maindetaildirigasi']);
Route::get('/kabkota', [MainController::class, 'mainkabkota']);
Route::get('/bendung', [MainController::class, 'mainbendung']);
Route::get('/jaringan', [MainController::class, 'mainjaringan']);
Route::get('/sawah', [MainController::class, 'mainsawah']);
Route::get('/coba1', [MainController::class, 'maincoba']);
// Route::get('/masyarakat', [MainController::class, 'createmasyarakat']);
Route::post('/smasyarakat', [MainController::class, 'storemasyarakat']);

//Map
Route::get('/map', [MainController::class, 'map']);

//Download Geojson
Route::get('kabkota/{kabkota:id}/download-geojson', [DKabkotaController::class, 'downloadGeoJson'])->name('kabkota.download-geojson')->middleware('auth');
Route::get('sawah/{sawah:id}/download-geojson', [DSawahController::class, 'downloadGeoJson'])->name('sawah.download-geojson')->middleware('auth');
Route::get('jaringan/{jaringan:id}/download-geojson', [DJaringanController::class, 'downloadGeoJson'])->name('jaringan.download-geojson')->middleware('auth');


// //Daerah Irigasi
// Route::get('/dirigasi', [DirigasiController::class, 'index']);
// Route::get('/kabkota/dirigasi/detail/{dirigasi:id}', [DirigasiController::class, 'detail']);
// Route::get('/dirigasi/detail/{dirigasi:id}', [DirigasiController::class, 'detail']);

// //Kabupaten Kota
// Route::get('/kabkota', [KabkotaController::class, 'index']);
// // Route::get('/kabkota/dirigasi/detail/{kabkota:id}', [KabkotaController::class, 'detail']);

// //Bendungan
// Route::get('/bendung', [BendungController::class, 'index']);

// //Jaringan Irigasi
// Route::get('/jaringan', [JaringanController::class, 'index']);

// //Sawah
// Route::get('/sawah', [SawahController::class, 'index']);
// Route::get('/sawah/download/{dirigasi:id}', [SawahController::class, 'downloadFile'])->name('sawah.download');
// Route::get('/sawah/{file}/download', [SawahController::class, 'download'])->name('file.download');
// Route::get('/sawah/{file}/download', [SawahController::class, 'download'])->name('file.download');
