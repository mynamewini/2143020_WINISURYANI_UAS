@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-box-open"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Produk --}}
                                            {{ $products->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Produk</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-tags"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Kategori --}}
                                            {{ $categories->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Katalog</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- Ambil Data Jumlah Pesanan --}}
                                            {{ $orders->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pesanan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{-- ordersCompleted --}}
                                            {{ $ordersCompleted->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pesanan Selesai</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Grafik --}}
                <div class="row">
                    <div class="col-6">

                        {{-- Card Grafik Keuangan --}}
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>
                                    Pemasukan Tahun {{ date('Y') }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <canvas id="moneyChart" width="500" height="180"></canvas>
                            </div>
                        </div>

                    </div>

                    <div class="col-6">
                        {{-- Card Grafik Penjualan --}}
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>Penjualan</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="orderChart" width="500" height="180"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                {{-- Status Profile Card --}}
                <div class="card shadow-sm">
                    <div class="card-body pt-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="https://cdn-icons-png.flaticon.com/512/706/706830.png" alt="avatar"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">
                                    {{-- Ambil Data Nama Admin --}}
                                    {{ Auth::user()->name }}
                                </h5>
                                <a href="">
                                    <h6 class="mb-0">Edit Profil</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Detail Keuangan (pemasukam) --}}
                <div class="card shadow-sm">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon purple">
                                {{-- Arrow Down Iconly --}}
                                <i class="iconly-boldWallet"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="font-bold">Pemasukan</h6>
                                <h6 class="text-muted mb-0">
                                    Rp {{ number_format($incomes->sum('amount'), 0, ',', '.') }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Jumlah Pelanggan --}}
                <div class="card shadow-sm">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon blue">
                                {{-- User Iconly --}}
                                <i class="iconly-boldUser"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="font-bold">Pelanggan</h6>
                                <h6 class="text-muted mb-0">
                                    {{-- Jumlah user dengan role user --}}
                                    {{ $users->where('role', 'user')->count() }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Chart.Js CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- Chart Pemasukan setiap Bulan --}}
        <script>
            var ctx = document.getElementById('moneyChart').getContext('2d');
            var moneyChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        @foreach ($incomes->sortBy('created_at') as $income)
                            // income_at perbulan
                            '{{ $income->created_at->format('M') }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Pemasukan',
                        data: [
                            @foreach ($incomes as $income)
                                {{ $income->amount }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(0, 123, 255, 0.1)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        {{-- Chart Penjualan setiap Bulan --}}
        <script>
            var ctx = document.getElementById('orderChart').getContext('2d');

            // Menghitung jumlah bulan antara Mei dan bulan terakhir dalam data
            @if (isset($ordersPerMonth[0]->month))
                var totalMonths = 12 - {{ $ordersPerMonth[0]->month }} + 5;
            @else
                var totalMonths = 12;
            @endif

            // Membuat array kosong untuk label bulan dan data grafik
            var labels = [];
            var data = [];

            // Menambahkan label bulan dan data grafik untuk bulan-bulan sebelum Mei dengan nilai nol
            @php
                $month = isset($ordersPerMonth[0]->month) ? $ordersPerMonth[0]->month : 0;
            @endphp

            @for ($i = 0; $i < $month - 1; $i++)
                labels.push('');
                data.push(0);
            @endfor

            // Menambahkan label bulan dan data grafik untuk bulan Mei hingga bulan terakhir dalam data
            @foreach ($ordersPerMonth as $order)
                labels.push('{{ date('M', mktime(0, 0, 0, $order->month, 1)) }}');
                data.push({{ $order->total }});
            @endforeach

            // Mengganti label bulan menjadi nama bulan yang sesuai
            for (var i = 0; i < labels.length; i++) {
                if (labels[i] === '') {
                    var monthIndex = i % 12; // Menentukan indeks bulan berdasarkan indeks iterasi
                    var monthName = new Date(null, monthIndex).toLocaleDateString('en', {
                        month: 'long'
                    }); // Mengonversi indeks bulan menjadi nama bulan
                    labels[i] = monthName;
                }
            }


            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Orders per Month',
                        data: data,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </div>
@endsection
