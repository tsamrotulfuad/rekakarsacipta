<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');

Route::get('/proposals', function () {
    return view('admin.proposal.index');
})->name('proposals');
Route::get('/proposals/tambah', function () {
    return view('admin.proposal.create');
})->name('proposals.create');


Route::get('/users', function () {
    return view('admin.user.index');
})->name('users');

Route::get('/login', function () {
    return view('auth.login.index');
})->name('login');

Route::get('/register', function () {
    return view('admin.user.index');
})->name('register');
