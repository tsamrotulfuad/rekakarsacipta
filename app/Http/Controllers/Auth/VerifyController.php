<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyController extends Controller
{
    // Menampilkan halaman pemberitahuan verifikasi
    public function verificationNotice()
    {
        return view('auth.verify.email');
    }

    // Memproses verifikasi dari tautan di email
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/masyarakat/dashboard')->with('message', 'Email berhasil diverifikasi!');
    }

    // Mengirim ulang tautan verifikasi
    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Tautan verifikasi baru telah dikirim!');
    }
}
