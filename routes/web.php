<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PakRTController;
use App\Http\Controllers\PakRWController;
use App\Http\Controllers\StaffKelurahanController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/register', [RegisterController::class, 'create_register'])->name('create_register');
Route::post('/register/create', [RegisterController::class, 'store_register'])->name('store_register');
Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/login', [RegisterController::class, 'login_action'])->name('login.action');

Route::post('/pakrt/approve/{userId}', [PakRTController::class, 'approveUser'])->name('pakrt.approve');
Route::post('/pakrt/approve/doc/{userId}', [PakRTController::class, 'approveUserDoc'])->name('pakrt.approve.doc');
Route::get('/pakrt/approve_users', [PakRTController::class, 'showApproveUsers'])->name('pakrt.approve_users');

Route::post('/pakrw/approve/doc/{userId}', [PakRWController::class, 'approveUserDocRw'])->name('pakrw.approve.doc');
Route::get('/index/rw', [PakRWController::class, 'index_rw'])->name('index-rw');

Route::get('/print-lampiran', [WargaController::class, 'printAttachment']);
Route::get('/warga/form/{userId}', [WargaController::class, 'showForm'])->name('warga.form');
Route::get('/index/warga', [WargaController::class, 'doneForm'])->name('done.form');
Route::get('/form/upload/{userId}', [WargaController::class, 'alreadyFilled'])->name('form.already_filled');
Route::post('/upload/image', [WargaController::class, 'uploadImage'])->name('upload.image');
Route::post('/warga/submit_form', [WargaController::class, 'submitForm'])->name('warga.submit_form');

Route::post('/verify/{userId}', [StaffKelurahanController::class, 'verifyUser'])->name('verify');
Route::get('/index/staffkelurahan', [StaffKelurahanController::class, 'index_kelurahan'])->name('index_kelurahan');
