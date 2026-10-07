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

        // 2. Coba mencocokkan kredensial ke database (Otomatis memverifikasi Bcrypt)
        if (Auth::attempt($credentials)) {

            // Membuat ulang ID sesi untuk mencegah serangan Session Fixation
            $request->session()->regenerate();

            // Mengalihkan user ke halaman tujuan awal sebelum diintersep auth, atau ke dashboard
            return redirect()->intended('/admin/dashboard');
        }

        // 3. Jika gagal login, lempar exception validasi untuk kembali ke form awal
        throw ValidationException::withMessages([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }
}
