<?php

use App\Http\Controllers\Admin\Masyarakat\DashboardController;
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
});

// Admin Inovasi
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function() {  
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); //Dashboard Masyrakat

    Route::get('/inovasi/masyarakat', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'index'])->name('inovasi.masyarakat.index'); //Inovasi Masyrakat
    Route::get('/inovasi/masyarakat/tambah', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'create'])->name('inovasi.masyarakat.create'); 
    Route::post('/inovasi/masyarakat/tambah', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'store'])->name('inovasi.masyarakat.store'); 
    Route::get('/inovasi/masyarakat/{id}/edit', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'edit'])->name('inovasi.masyarakat.edit');
    Route::put('/inovasi/masyarakat/{id}', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'update'])->name('inovasi.masyarakat.update');
    Route::delete('/inovasi/masyarakat/{id}', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'destroy'])->name('inovasi.masyarakat.destroy');
});

// Masyarakat Inovasi
Route::middleware(['auth', 'verified'])->prefix('masyarakat')->group(function() {  
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); //Dashboard Masyrakat

    Route::get('/inovasi', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'index'])->name('inovasi.masyarakat.index'); //Inovasi Masyrakat
    Route::get('/inovasi/tambah', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'create'])->name('inovasi.masyarakat.create'); 
    Route::post('/inovasi/tambah', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'store'])->name('inovasi.masyarakat.store'); 
    Route::get('/inovasi/{id}/edit', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'edit'])->name('inovasi.masyarakat.edit');
    Route::put('/inovasi/{id}', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'update'])->name('inovasi.masyarakat.update');
    Route::delete('/inovasi/{id}', [App\Http\Controllers\Admin\Masyarakat\InovasiController::class, 'destroy'])->name('inovasi.masyarakat.destroy');
});

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

 // User
Route::get('/users', function () {
    return view('admin.user.index');
})->name('users');
