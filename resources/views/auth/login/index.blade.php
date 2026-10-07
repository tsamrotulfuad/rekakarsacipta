@extends('layouts.auth')

@section('content')
    <div class="card p-4">
        <div class="card-body d-flex flex-column gap-4">
            <h2 class="h5 text-center">Masuk Akun</h2>
            @if ($errors->any())
                <div class="card border-start border-start-lg border-danger mb-3 bg-danger bg-opacity-10"
                    style="margin-top: 5px;">
                    <div class="card-body p-3 d-flex align-items-center">
                        <!-- Ikon Tanda Seru / Peringatan -->
                        <svg class="icon icon-lg me-3 text-danger" xmlns="http://w3.org" width="24" height="24"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                        </svg>
                        <!-- Teks Pesan Error -->
                        <div class="text-danger-emphasis fw-medium">
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
            @endif
            @if (session('message'))
                <div class="card border-start border-start-lg border-success mb-3 bg-success bg-opacity-10">
                    <div class="card-body p-3 d-flex align-items-center">
                        <!-- Ikon Centang Sukses -->
                        <svg class="icon icon-lg me-3 text-success" xmlns="http://w3.org" width="24" height="24"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                        <div class="text-success-emphasis fw-medium">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif
            <form class="row gap-3" action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                <div>
                    <label class="form-label" for="email">Email </label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                        value="{{ old('email') }}" autocomplete="off">
                </div>
                <div>
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        <a href="#" class="text-decoration-none">Lupa Password</a>
                    </div>
                    <div class="input-group">
                        <input class="form-control" id="password" type="password" name="password" placeholder="Password"
                            autocomplete="off">
                        <span class="input-group-text">
                            <!-- Mengubah data-coreui-toggle menjadi id="togglePassword" -->
                            <button class="bg-transparent border-0 p-0 link-secondary" type="button" id="togglePassword"
                                aria-label="Show password">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path class="ci-primary" fill="var(--ci-primary-color, currentcolor)"
                                        d="M256 144.927a103.309 103.309 0 1 0 103.309 103.309A103.426 103.426 0 0 0 256 144.927m0 174.618a71.309 71.309 0 1 1 71.309-71.309A71.39 71.39 0 0 1 256 319.545">
                                    </path>
                                    <path class="ci-primary" fill="var(--ci-primary-color, currentcolor)"
                                        d="m397.222 131.1-.218-.223c-77.75-77.749-204.258-77.749-282.008 0L16 233.79v28.893l98.778 102.689.218.222a199.41 199.41 0 0 0 282.008 0l99-102.911V233.79ZM464 249.79l-89.732 93.285a167.41 167.41 0 0 1-236.536 0L48 249.79v-3.107l89.729-93.283c65.247-65.13 171.3-65.13 236.542 0L464 246.683Z">
                                    </path>
                                    <path class="ci-primary" fill="var(--ci-primary-color, currentcolor)"
                                        d="M240 232h32v32h-32z"></path>
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary w-100" type="submit">Masuk</button>
                </div>
            </form>

            <div class="position-relative">
                <hr>
                <div
                    class="position-absolute top-50 start-50 translate-middle bg-body px-2 text-body-tertiary text-uppercase small">
                    atau</div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-outline w-100" href="#">
                        <svg class="icon me-1" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24 12.27C24 11.48 23.9284 10.73 23.8058 9.99998H12.2605V14.51H18.871C18.5747 15.99 17.7062 17.24 16.4189 18.09V21.09H20.3627C22.6717 19 24 15.92 24 12.27Z"
                                fill="#4285F4"></path>
                            <path
                                d="M12.2606 24C15.571 24 18.3398 22.92 20.3628 21.09L16.419 18.09C15.3156 18.81 13.9158 19.25 12.2606 19.25C9.06269 19.25 6.35515 17.14 5.38453 14.29H1.31812V17.38C3.33089 21.3 7.46882 24 12.2606 24Z"
                                fill="#34A853"></path>
                            <path
                                d="M5.38442 14.2901C5.12899 13.5701 4.99617 12.8001 4.99617 12.0001C4.99617 11.2001 5.13921 10.4301 5.38442 9.71009V6.62009H1.31801C0.480203 8.24009 0 10.0601 0 12.0001C0 13.9401 0.480203 15.7601 1.31801 17.3801L5.38442 14.2901Z"
                                fill="#FBBC05"></path>
                            <path
                                d="M12.2606 4.74998C14.0691 4.74998 15.6834 5.35999 16.9605 6.54999L20.4548 3.12999C18.3398 1.18999 15.571 -1.52588e-05 12.2606 -1.52588e-05C7.46882 -1.52588e-05 3.33089 2.69999 1.31812 6.61999L5.38453 9.70999C6.35515 6.85999 9.06269 4.74998 12.2606 4.74998Z"
                                fill="#EA4335"></path>
                        </svg>
                        Masuk dengan Akun Google
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center text-body-secondary">
        Butuh akun?
        <a href="{{ route('register') }}" class="text-decoration-none">Daftar Akun</a>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const passwordInput = document.querySelector('#password');

            togglePassword.addEventListener('click', function() {
                // Tukar tipe input antara password dan text
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Opsional: Anda bisa mengganti warna atau ikon button di sini saat statusnya berubah
                this.classList.toggle('link-primary');
                this.classList.toggle('link-secondary');
            });
        });
    </script>
@endpush
