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
                        <div class="card bg-primary shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-box-open"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{ $products->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Produk</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card bg-secondary shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-tags"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{ $categories->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Katalog</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card bg-success shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-basket-shopping"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{ $orders->count() }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Pesanan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card bg-danger shadow-sm">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-3 mt-2 fs-4">
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-extrabold mb-2">
                                            {{ $orders->sum('quantity') }}
                                        </h6>
                                        <h6 class="text-muted font-semibold">Produk Terjual</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Grafik Penjualan --}}
                    <div class="col-12 col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>
                                    <i class="fa-solid fa-chart-line"></i> &nbsp;
                                    Grafik Penjualan
                                </h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" width="400" height="235"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- Tabel Pesanan Terbaru --}}
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h4>
                                    <i class="fa-solid fa-bell"></i> &nbsp;
                                    Pesanan Terbaru
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Order</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($latestOrders as $order)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>
                                                        <small>
                                                            #{{ $order->id }}
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @if ($order->shipping_status == 'pending')
                                                            <span class="badge bg-warning text-dark">Pending</span>
                                                        @elseif ($order->shipping_status == 'processing')
                                                            <span class="badge bg-info text-dark">Dikemas</span>
                                                        @elseif ($order->shipping_status == 'completed')
                                                            <span class="badge bg-success text-white">Selesai</span>
                                                        @elseif ($order->shipping_status == 'shipping')
                                                            <span class="badge bg-primary text-white">Dikirim</span>
                                                        @elseif ($order->shipping_status == 'cancelled')
                                                            <span class="badge bg-danger text-white">Cancelled</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('operator.orders.index') }}" class="btn btn-primary mt-1">Lihat Semua</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-12 col-lg-3">
                {{-- Status Profile Card --}}
                <div class="card shadow-sm">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="https://cdn-icons-png.flaticon.com/512/11498/11498793.png" alt="avatar"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">
                                    {{-- Name --}}
                                    {{ Auth::user()->name }}
                                </h5>
                                <h6 class="text-muted mb-0">
                                    {{ Auth::user()->username }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="desc pb-4 pt-2 px-4">
                        <h6 class="font-bold">
                            {{-- Role --}}
                            Operator
                        </h6>
                        <hr>
                        <a href="#">Edit Profile</a>
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
                                <h6 class="font-bold">Pendapatan</h6>
                                <h6 class="text-muted mb-0">
                                    Rp. {{ number_format($totalIncome) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Jumlah Pelanggan --}}
                <div class="card shadow-sm">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="stats-icon purple">
                                {{-- User Iconly --}}
                                <i class="iconly-boldUser"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="font-bold">Pelanggan</h6>
                                <h6 class="text-muted mb-0">
                                    {{ $customers }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Chart.Js CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- Chart.Js Penjualan --}}
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');

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
                    labels[i] = 'May'; // Mengganti label bulan kosong dengan Mei
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
