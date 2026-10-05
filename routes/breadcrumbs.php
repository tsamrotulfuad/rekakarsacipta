<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Beranda / Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Halaman Manajemen User (Dashboard > Users)
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    // $trail->parent('dashboard');
    $trail->push('Users', route('users'));
});

Breadcrumbs::for('inovasi.masyarakat.index', function (BreadcrumbTrail $trail) {
    // $trail->parent('dashboard');
    $trail->push('Inovasi', route('inovasi.masyarakat.index'));
});

// Halaman Detail User Dinamis (Dashboard > Users > Nama User)
Breadcrumbs::for('inovasi.masyarakat.create', function (BreadcrumbTrail $trail) {
    $trail->parent('inovasi.masyarakat.index');
    $trail->push('Tambah', route('inovasi.masyarakat.create'));
});



// Halaman Detail User Dinamis (Dashboard > Users > Nama User)
// Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user) {
//     $trail->parent('users.index');
//     $trail->push($user->name, route('users.show', $user));
// });
