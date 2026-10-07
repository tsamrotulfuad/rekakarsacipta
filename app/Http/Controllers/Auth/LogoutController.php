<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        // Mengeluarkan user dari sesi autentikasi
        Auth::logout();

        // Membatalkan validasi sesi user saat ini
        $request->session()->invalidate();

        // Membuat ulang token CSRF baru untuk keamanan sesi berikutnya
        $request->session()->regenerateToken();

        // Mengalihkan pengguna kembali ke halaman utama atau login
        return redirect('/login')->with('message', 'Anda telah berhasil keluar.');
    }
}
