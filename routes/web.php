<?php

use App\Http\Controllers\Admin\Masyarakat\DashboardController;
use App\Http\Controllers\Admin\Masyarakat\InovasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login.index');
})->name('login');

Route::get('/register', function () {
    return view('admin.user.index');
})->name('register');

Route::get('/users', function () {
    return view('admin.user.index');
})->name('users');

// Admin Proposal
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard'); //Dashboard Masyrakat
Route::get('/admin/inovasi/masyarakat', [InovasiController::class, 'index'])->name('inovasi.masyarakat.index'); //Inovasi Masyrakat
Route::get('/admin/inovasi/masyarakat/tambah', [InovasiController::class, 'create'])->name('inovasi.masyarakat.create'); 
Route::post('/admin/inovasi/masyarakat/tambah', [InovasiController::class, 'store'])->name('inovasi.masyarakat.store'); 
Route::get('/admin/inovasi/masyarakat/{id}/edit', [InovasiController::class, 'edit'])->name('inovasi.masyarakat.edit');
Route::put('/admin/inovasi/masyarakat/{id}', [InovasiController::class, 'update'])->name('inovasi.masyarakat.update');
Route::delete('/admin/inovasi/masyarakat/{id}', [InovasiController::class, 'destroy'])->name('inovasi.masyarakat.destroy');

