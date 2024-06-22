@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card bg-primary shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl bg-primary">
                                        {{-- Box --}}
                                        <i class="fa-solid fa-box-open"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="font-bold">
                                            {{ $products->count() }}
                                        </h5>
                                        <h6 class="text-muted mb-0">
                                            Total Produk
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card bg-secondary shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl bg-secondary">
                                        {{-- Tag --}}
                                        <i class="fa-solid fa-tag"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="font-bold">
                                            {{ $categories->count() }}
                                        </h5>
                                        <h6 class="text-muted mb-0">
                                            Jumlah Katalog
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card bg-danger shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl bg-danger">
                                        {{-- Shop Bag --}}
                                        <i class="fa-solid fa-shopping-bag"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="font-bold">
                                            {{ $orders->count() }}
                                        </h5>
                                        <h6 class="text-muted mb-0">
                                            Jumlah Pesanan
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Table Riwayat Pesanan --}}
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5>Riwayat Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>
                                                @foreach ($products as $product)
                                                    @if ($product->id == $order->product_id)
                                                        <span class="badge bg-secondary">{{ $product->name }}</span>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $order->quantity }}
                                            </td>
                                            <td>Rp {{ number_format($order->total) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                <img src="https://cdn-icons-png.flaticon.com/512/706/706830.png" alt="avatar"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">
                                    {{ Auth::user()->name }}
                                </h5>
                                <h6 class="text-muted mb-0">
                                    {{-- Edit Profil --}}
                                    <a href="/">Edit Profil</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Total Pembelian --}}
                <div class="card bg-primary shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl bg-primary">
                                <i class="fa-solid fa-wallet"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="font-bold">Total Pembelian</h5>
                                <h6 class="text-muted mb-0">
                                    Rp {{ number_format($totalOrder) }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card data product yang paling banyak dibeli oleh user --}}
                <div class="card bg-success shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="font-bold">Produk Favorit</h5>
                                <h6 class="text-muted mb-0">
                                    @foreach ($products as $product)
                                        @if ($product->id == $mostProductId)
                                            {{ $product->name }}
                                        @endif
                                    @endforeach
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
