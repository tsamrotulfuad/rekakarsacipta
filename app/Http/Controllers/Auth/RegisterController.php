<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    // Menampilkan view Register
    public function index()
    {
        return view('auth.register.index');
    }

    // Memproses Register
    public function register(Request $request)
    {
        // Validasi Registerasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Membuat User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Tambahkan baris ini untuk otomatis memberikan role 'masyarakat'
        $user->assignRole('masyarakat');

        // Memicu event agar Laravel mengirimkan email verifikasi otomatis
        event(new Registered($user));

        // Mengautentikasi user yang baru mendaftar
        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
