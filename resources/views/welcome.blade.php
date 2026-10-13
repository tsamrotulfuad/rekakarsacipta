<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reka Karsa Cipta</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/rkc-logo.webp') }}">

    <!-- Custom CSS untuk mempercantik Countdown dan Jumbotron -->
    <style>
        .countdown-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .countdown-box span {
            display: block;
            font-size: 2.5rem;
            font-weight: 700;
            color: #0d6efd;
        }

        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 80px;
        }

        /* Memberi jarak saat scroll dari navbar */
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm" aria-label="Thirteenth navbar example">
        <div class="container-fluid">
            <!-- LOGO: Berada di luar collapse agar selalu tampil di Mobile -->
            <a class="navbar-brand me-auto" href="/">
                <img src="{{ asset('logo/rkc-logo.webp') }}" alt="Logo Reka Karsa Cipta" height="36"
                    class="d-inline-block align-text-top object-fit-contain">
            </a>

            <!-- MOBILE ACTIONS: Tampil hanya di ukuran mobile (tombol login & toggler) -->
            <div class="d-flex align-items-center d-lg-none gap-2">
                <a href="#login" class="btn btn-outline-primary btn-md">Login</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <!-- COLLAPSE MENU -->
            <div class="collapse navbar-collapse" id="navbarsExample11">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#unduhan">Unduhan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>

                <!-- DESKTOP ACTIONS: Tombol Login & Register untuk ukuran besar -->
                <div class="d-none d-lg-flex justify-content-end gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                </div>

                <!-- MOBILE REGISTER BUTTON: Tampil di dalam collapse untuk mobile -->
                <div class="d-lg-none mt-2">
                    <a href="{{ route('register') }}" class="btn btn-primary w-100">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- CAROUSEL / JUMBOTRON SECTION -->
    <section id="home">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <!-- Slide 1 (Tema Lomba Inovasi) -->
                <div class="carousel-item active"
                    style="min-height: 450px; background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://rekakarsacipta.pasuruankota.go.id/covers/rkc2025.webp') no-repeat center center; background-size: cover;">
                    <div class="container-fluid py-5">
                        <div class="row align-items-center justify-content-center text-center text-white"
                            style="min-height: 450px;">
                            <div class="col-lg-8">
                                <span class="badge bg-primary px-3 py-2 rounded-pill text-uppercase mb-3">Kategori
                                    Terbuka</span>
                                <h1 class="display-4 fw-bold">Selamat Datang di Reka Karsa Cipta</h1>
                                <p class="lead mt-3">Tunjukkan karya terbaikmu di Lomba Inovasi Nasional! Platform
                                    unggulan untuk kolaborasi, kreativitas, dan pengembangan masa depan.</p>
                                <div class="d-flex justify-content-center gap-3 mt-4">
                                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 shadow">Daftar Sekarang</a>
                                    <a href="#unduhan" class="btn btn-outline-light btn-lg px-4">Unduh Panduan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 (Tema Kompetisi/Eksibisi) -->
                <div class="carousel-item"
                    style="min-height: 450px; background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://rekakarsacipta.pasuruankota.go.id/covers/covers.webp') no-repeat center center; background-size: cover;">
                    <div class="container py-5">
                        <div class="row align-items-center justify-content-center text-center text-white"
                            style="min-height: 450px;">
                            <div class="col-lg-8">
                                <span
                                    class="badge bg-warning text-dark px-3 py-2 rounded-pill text-uppercase mb-3">Pengumuman</span>
                                <h1 class="display-4 fw-bold">Siapkan Inovasi Terbaikmu!</h1>
                                <p class="lead mt-3">Jangan lewatkan kesempatan memperebutkan total hadiah, penghargaan, dan bimbingan eksklusif.</p>
                                <div class="d-flex justify-content-center gap-3 mt-4">
                                    <a href="#kontak" class="btn btn-outline-light btn-lg px-4">Hubungi Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COUNTDOWN SECTION -->
    <section id="countdown-section" class="container mt-5 py-5 border-bottom">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h2 class="mb-4 fw-bold">Pendaftaran Ditutup Dalam:</h2>
                <div class="row g-2 justify-content-center">
                    <div class="col-6 col-md-3">
                        <div class="countdown-box">
                            <span id="days">00</span> Hari
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="countdown-box">
                            <span id="hours">00</span> Jam
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="countdown-box">
                            <span id="minutes">00</span> Menit
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="countdown-box">
                            <span id="seconds">00</span> Detik
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PENGUMUMAN SECTION -->
    <section id="pengumuman" class="container mt-5 py-4">
        <h2 class="text-center fw-bold mb-4">Pengumuman</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pendaftaran Dibuka</h5>
                        <h6 class="card-subtitle mb-2 text-muted">12 Oktober 2026</h6>
                        <p class="card-text">Pendaftaran gelombang pertama resmi dibuka. Segera lengkapi berkas Anda
                            sebelum waktu habis.</p>
                    </div>
                </div>
            </div>
            <!-- Tambahkan card pengumuman lainnya disini -->
        </div>
    </section>

    <!-- UNDUHAN SECTION -->
    <section id="unduhan" class="container-fluid mt-5 py-4 bg-light rounded-3">
        <h4 class="text-center fw-bold mb-4">Pusat Unduhan</h4>
        <ul class="list-group list-group-flush w-75 mx-auto">
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                Panduan Pendaftaran Tahun 2026
                <a href="#" class="btn btn-sm btn-success">Download</a>
            </li>

        </ul>
    </section>

    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="{{ asset('logo/rkc-logo.webp') }}" alt="Logo Reka Karsa Cipta" height="86"
                        class="d-inline-block align-text-top object-fit-contain">
                </a>
                <p class="text-body-secondary">&copy; 2026 Reka Karsa Cipta</p>
            </div>

            <div class="col mb-3">
                <!-- Kolom kosong untuk memberikan jarak yang mirip dengan gambar -->
            </div>

            <div class="col mb-3" id="kontak">
                <h5>Kontak Kami</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#"
                            class="nav-link p-0 text-body-secondary">Instagram</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Youtube</a>
                    </li>
                </ul>
            </div>



            <div class="col mb-3">
                <h5>Alamat</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Jl. Sultan
                            Agung No. 32 Kota Pasuruan</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Telp
                            (0343-424064)</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Email:
                            bapperida@pasuruankota.go.id</a></li>
                </ul>
            </div>
        </footer>
    </div>

    <!-- Bootstrap & Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous">
    </script>

    <!-- Script Countdown Timer -->
    <script>
        // Set tanggal akhir hitung mundur (Contoh: 31 Desember 2026)
        const countDownDate = new Date("Nov 15, 2026 23:59:59").getTime();

        const x = setInterval(function() {
            // Ambil waktu hari ini
            const now = new Date().getTime();

            // Hitung selisih waktu
            const distance = countDownDate - now;

            // Kalkulasi waktu untuk hari, jam, menit, detik
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Tampilkan hasil di elemen HTML
            document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
            document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');

            // Jika hitungan mundur selesai
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("days").innerHTML = "00";
                document.getElementById("hours").innerHTML = "00";
                document.getElementById("minutes").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "00";
            }
        }, 1000);
    </script>
</body>

</html>
