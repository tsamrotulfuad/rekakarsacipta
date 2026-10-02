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

Breadcrumbs::for('proposals', function (BreadcrumbTrail $trail) {
    // $trail->parent('dashboard');
    $trail->push('Proposal', route('proposals'));
});

// Halaman Detail User Dinamis (Dashboard > Users > Nama User)
Breadcrumbs::for('proposals.create', function (BreadcrumbTrail $trail) {
    $trail->parent('proposals');
    $trail->push('Form', route('proposals.create'));
});



// Halaman Detail User Dinamis (Dashboard > Users > Nama User)
// Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user) {
//     $trail->parent('users.index');
//     $trail->push($user->name, route('users.show', $user));
// });
