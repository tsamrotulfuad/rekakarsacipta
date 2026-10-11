<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Registrasi (Akses Guest)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // route login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Route Verifikasi Email (Akses Auth)
Route::middleware('auth')->group(function () {
    
    // Halaman pemberitahuan belum verifikasi
    Route::get('/email/verify', [VerifyController::class, 'verificationNotice'])->name('verification.notice');

    // Proses ketika link verifikasi di email diklik
    Route::get('/email/verify/{id}/{hash}', [VerifyController::class, 'verifyEmail'])
        ->middleware(['signed', 'throttle:6,1']) // 
        ->name('verification.verify');

    // Tombol kirim ulang email verifikasi
    Route::post('/email/verification-notification', [VerifyController::class, 'resendVerification'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// Admin Inovasi
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function() {  
    Route::get('/dashboard', [App\Http\Controllers\Admin\Masyarakat\DashboardController::class, 'index'])->name('admin.dashboard'); //Dashboard Masyrakat

    // Inovasi
    Route::get('/inovasi/masyarakat', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'index'])->name('inovasi.admin.index'); //Inovasi Masyrakat
    Route::get('/inovasi/masyarakat/tambah', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'create'])->name('inovasi.admin.create'); 
    Route::post('/inovasi/masyarakat/tambah', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'store'])->name('inovasi.admin.store'); 
    Route::get('/inovasi/masyarakat/{id}/edit', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'edit'])->name('inovasi.admin.edit');
    Route::put('/inovasi/masyarakat/{id}', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'update'])->name('inovasi.admin.update');
    Route::delete('/inovasi/masyarakat/{id}', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'destroy'])->name('inovasi.admin.destroy');

    // User
    Route::get('/user', [App\Http\Controllers\Admin\User\UserController::class, 'index'])->name('users.admin.index');
    Route::get('/user/tambah', [App\Http\Controllers\Admin\User\UserController::class, 'create'])->name('users.admin.create'); 
    Route::post('/user/tambah', [App\Http\Controllers\Admin\User\UserController::class, 'store'])->name('users.admin.store'); 
    Route::get('/user/{id}/edit', [App\Http\Controllers\Admin\User\UserController::class, 'edit'])->name('users.admin.edit');
    Route::put('/user/{id}', [App\Http\Controllers\Admin\User\UserController::class, 'update'])->name('users.admin.update');
    Route::delete('/user/{id}', [App\Http\Controllers\Admin\User\UserController::class, 'destroy'])->name('users.admin.destroy');
});

// Masyarakat Inovasi
Route::middleware(['auth', 'verified'])->prefix('masyarakat')->group(function() {  
    Route::get('/dashboard', [App\Http\Controllers\Masyarakat\DashboardController::class, 'index'])->name('masyarakat.dashboard'); //Dashboard Masyrakat

    Route::get('/inovasi', [App\Http\Controllers\Masyarakat\InovasiController::class, 'index'])->name('inovasi.masyarakat.index'); //Inovasi Masyrakat
    Route::get('/inovasi/tambah', [App\Http\Controllers\Masyarakat\InovasiController::class, 'create'])->name('inovasi.masyarakat.create'); 
    Route::post('/inovasi/tambah', [App\Http\Controllers\Masyarakat\InovasiController::class, 'store'])->name('inovasi.masyarakat.store'); 
    Route::get('/inovasi/{inovasiMasyarakat}/edit', [App\Http\Controllers\Masyarakat\InovasiController::class, 'edit'])->name('inovasi.masyarakat.edit');
    Route::put('/inovasi/{inovasiMasyarakat}', [App\Http\Controllers\Masyarakat\InovasiController::class, 'update'])->name('inovasi.masyarakat.update');
    Route::delete('/inovasi/{inovasiMasyarakat}', [App\Http\Controllers\Masyarakat\InovasiController::class, 'destroy'])->name('inovasi.masyarakat.destroy');
});


