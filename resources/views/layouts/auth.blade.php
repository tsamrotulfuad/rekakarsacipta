<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Reka Karsa Cipta</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('logo/Logo-RKC-Emas.webp') }}">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/config.js') }}"></script>
</head>

<body>
    <div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
        <div class="container" style="max-width: 32rem">
            <div class="d-flex flex-column gap-4 my-4">
                <!-- LOGO BARU DENGAN FORMAT .WEBP -->
                <img src="{{ asset('logo/Logo-RKC-Emas.webp') }}" alt="Logo Reka Karsa Cipta" height="124"
                    class="mx-auto w-auto object-fit-contain">

                @yield('content')

            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script>
        const header = document.querySelector("header.header");

        document.addEventListener("scroll", () => {
            if (header) {
                header.classList.toggle("shadow-sm", document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-coreui-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new coreui.Tooltip(tooltipTriggerEl));
    </script>
    @stack('scripts')
</body>

</html>
