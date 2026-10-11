<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }

    public function login(Request $request)
    {
        // 1. Validasi input form
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // 2. Coba autentikasi pengguna
        if (Auth::attempt($credentials)) {

            // Regenerasi ID sesi untuk mencegah serangan Session Fixation
            $request->session()->regenerate();

            // Ambil data user yang sedang login
            $user = Auth::user();

            // Pengecekan role menggunakan Spatie Permission
            if ($user->hasRole('admin')) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->hasRole('masyarakat')) {
                return redirect()->intended('/masyarakat/dashboard');
            }

            // Opsi fallback jika role tidak sesuai atau tidak terdefinisi
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Email atau password yang Anda masukkan salah.',
            ]);
        }

        // 3. Jika gagal login
        throw ValidationException::withMessages([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }
}