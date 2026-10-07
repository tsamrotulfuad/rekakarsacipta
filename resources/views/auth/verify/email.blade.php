@extends('layouts.auth')

@section('content')
    <div class="card p-4">
        <div class="card-body d-flex flex-column gap-4">
        <div class="h3 text-center">Verifikasi Alamat Email Anda</div>
        <p>Sebelum melanjutkan, silakan periksa email Anda untuk menemukan tautan verifikasi.</p>

        <form action="{{ route('verification.send') }}" method="POST" class="text-center">
            @csrf
            <button class="btn btn-link text-decoration-none" type="submit">Klik di sini untuk mengirim ulang email verifikasi</button>
        </form>
        @if (session('message'))
            <div style="color: green;">{{ session('message') }}</div>
        @endif
    </div>
    </div>
@endsection
