<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ $title }} - Rotiku
    </title>

    <!-- Meta Open Graph -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/static/images/logo/favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/static/images/logo/favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/static/images/logo/favicon.svg') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/static/images/logo/favicon.svg') }}">
    <link rel="manifest" href="{{ asset('backend/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('backend/static/images/logo/favicon.svg') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Meta Description -->
    <meta name="description" content="MyOrmawa is a Laravel Web App for managing organization's activities.">

    <!-- Stylesheet -->
    <link href="{{ asset('backend/compiled/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/compiled/css/app-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/compiled/css/iconly.css') }}" rel="stylesheet">

    <!-- Custom Main CSS File -->
    <link href="{{ asset('backend/compiled/css/custom.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('backend/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">

    {{-- CDN DataTable --}}
    <link rel="stylesheet" href="{{ asset('backend/extensions/datatables.net-bs5/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/compiled/css/table-datatable-jquery.css') }}">

</head>

<body>

    <script src="{{ asset('backend/static/js/initTheme.js') }}"></script>

    <div id="app">
        @include('components.dashboard.sidebar')
        <div id="main">
            @include('components.dashboard.header')
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('backend/compiled/js/app.js') }}"></script>
    <script src="{{ asset('backend/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('backend/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    
    {{-- CDN FontAwesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- CDN DataTable --}}
    <script src="{{ asset('backend/extensions/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/extensions/datatables.net/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/extensions/datatables.net-bs5/js/dataTables.bootstrap5.js') }}"></script>

    {{-- Custom JS --}}
    <script src="{{ asset('backend/static/js/custom.js') }}"></script>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

    <script>
        $(document).ready(function() {
            // Objek untuk memetakan judul halaman ke ID elemen yang sesuai
            var titleToId = {
                'Dashboard': '#dashboard',
                'Katalog Produk': '#catalog',
                'Produk': '#product',
                'Detail Produk': '#product',
                'Detail Pesanan': '#pesanan',
                'Daftar Pesanan': '#pesanan',
                'Riwayat Pesanan': '#history',
                'Pendapatan': '#pendapatan',
                'Data Administrator': '#users',
                'Data Pelanggan': '#pelanggan',
                'Data Operator': '#operator',
                'Keluhan Pelanggan': '#aspirasi',
                'Detail Keluhan': '#aspirasi',
                'Pengaturan': '#settings'
            };

            var title = "{{ $title }}";

            // Hapus kelas 'active' dari semua elemen
            $('.sidebar-menu li').removeClass('active');

            // Tambahkan kelas 'active' ke elemen yang sesuai dengan judul halaman
            var correspondingId = titleToId[title];
            if (correspondingId) {
                $(correspondingId).addClass('active');
            } else {
                // Tambahkan penanganan jika judul halaman tidak ditemukan dalam objek
                console.error('ID elemen tidak ditemukan untuk judul halaman:', title);
            }
        });
    </script>


</body>

</html>
