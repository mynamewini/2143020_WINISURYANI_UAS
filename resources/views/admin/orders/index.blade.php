@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Table admin.categories --}}
            <div class="col-md-12">
                <div class="card p-2">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Penerima</th>
                                        <th>ID Pesanan</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($order->shipping_status == 'completed')
                                                    <span class="badge bg-success">Terkirim</span>
                                                @elseif ($order->shipping_status == 'shipping')
                                                    <span class="badge bg-warning text-dark">Sedang Dikirim</span>
                                                @elseif ($order->shipping_status == 'processing')
                                                    <span class="badge bg-secondary">Dikemas</span>
                                                @elseif ($order->shipping_status == 'declined')
                                                    <span class="badge bg-danger">Dibatalkan</span>
                                                @else
                                                    <span class="badge bg-primary">Belum Dikirim</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->id }}</td>
                                            <td>
                                                <span class="badge bg-primary mb-1">
                                                    Rp {{ number_format($order->total) }}
                                                </span>
                                                    
                                                {{-- Badge Bayar --}}
                                                @if ($order->payment_status == 'pending')
                                                    <span class="badge bg-warning text-dark">
                                                        Konfirmasi Pembayaran
                                                    </span>
                                                @elseif ($order->payment_status == 'paid')
                                                    <span class="badge bg-success">Lunas</span>
                                                @elseif ($order->payment_status == 'failed')
                                                    <span class="badge bg-danger">Pembayaran Gagal</span>
                                                @elseif ($order->payment_status == 'unpaid')
                                                    <span class="badge bg-danger">Belum Dibayar</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.orders.show', ['user' => $order->user_id, 'order' => $order->id]) }}"
                                                    class="btn btn-sm btn-primary">Detail Pesanan</a>

                                                @if ($order->shipping_status == 'shipping')
                                                    <form
                                                        action="{{ route('admin.orders.completed', ['user' => $order->user_id, 'order' => $order->id]) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-success">Diterima</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
