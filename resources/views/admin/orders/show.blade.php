@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>
                        {{ $title }}
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.orders.index', ['user' => Auth::user()->id]) }}">Pesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="panel-body no-padding">
                        {{-- Tombol Print --}}
                        <div class="text-start">
                            <a href="" class="btn btn-primary" target="_blank">
                                <i class="bi bi-printer"></i> Print
                            </a>
                        </div>
                        <hr>
                        <div class="row">

                            {{-- Detail Pesanan --}}
                            <div class="col-md-6">
                                <h4>
                                    Detail Pesanan
                                </h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nomor Pesanan</th>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Pesanan</th>
                                        <td>{{ $order->type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Dibuat</th>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>Rp {{ number_format($order->total) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Pengiriman</th>
                                        <td>
                                            {{-- Ubah status dengan dropdown --}}
                                            <form
                                                action="{{ route('admin.orders.updateShipping', ['user' => Auth::user()->id, 'order' => $order->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="shipping_status" class="form-select">
                                                    <option value="pending" @if ($order->shipping_status == 'pending') selected @endif>
                                                        Belum Dikirim</option>
                                                    <option value="processing" @if ($order->shipping_status == 'processing') selected @endif>
                                                        Dikemas</option>
                                                    <option value="shipping" @if ($order->shipping_status == 'shipping') selected @endif>
                                                        Sedang Dikirim</option>
                                                    <option value="completed" @if ($order->shipping_status == 'completed') selected @endif>
                                                        Terkirim</option>
                                                    <option value="declined" @if ($order->shipping_status == 'declined') selected @endif>
                                                        Dibatalkan</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-primary mt-2">Ubah Status</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Pesanan</th>
                                        <td>
                                            @if ($order->accepted_status == 'accepted')
                                                <span class="badge bg-warning text-dark">Diterima</span>
                                            @elseif ($order->shipping_status == 'shipping')
                                                <span>Sedang Dikirim</span>
                                            @else
                                                <span class="badge bg-danger">Belum Diterima</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            {{-- Detail Customer --}}
                            <div class="col-md-6">
                                <h4>Detail Customer</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Telepon</th>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Pengiriman</th>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Catatan Pembeli</th>
                                        <td>
                                            @if ($order->customer_notes)
                                                {{ $order->customer_notes }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Konfirmasi Barang Diterima</th>
                                        <td>
                                            @if ($order->accepted_status == 'accepted')
                                                <span class="badge bg-success">Diterima</span>
                                            @else
                                                <span class="badge bg-danger">Belum Diterima</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- Form Admin Notes --}}
                                        <th>Catatan Admin</th>
                                        <td>
                                            <form
                                                action="{{ route('admin.orders.updateAdminNotes', ['user' => Auth::user()->id, 'order' => $order->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <textarea name="admin_notes" class="form-control"
                                                    placeholder="Catatan Admin">{{ $order->admin_notes }}</textarea>
                                                <button type="submit" class="btn btn-sm btn-primary mt-2">Simpan Catatan</button>
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            {{-- Detail Pembayaran --}}
                            <div class="col-12">
                                <h4>Detail Pembayaran</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Status Pembayaran</th>
                                        <td>
                                            @if ($order->payment_status == 'paid')
                                                <span class="badge bg-success">Lunas</span>
                                            @elseif ($order->payment_status == 'pending')
                                                <span class="badge bg-warning text-dark">Menunggu Konfirmasi Admin</span>
                                            @else
                                                <span class="badge bg-danger">Belum Dibayar</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->payment_status == 'pending')
                                                <form
                                                    action="{{ route('admin.orders.confirmPayment', ['user' => Auth::user()->id, 'order' => $order->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="payment_status" value="paid">
                                                    <button type="submit" class="btn btn-sm btn-success">Konfirmasi
                                                        Pembayaran</button>
                                                </form>
                                            @elseif ($order->payment_status == 'paid')
                                                <form
                                                    action="{{ route('admin.orders.confirmPayment', ['user' => Auth::user()->id, 'order' => $order->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="payment_status" value="pending">
                                                    <button type="submit" class="btn btn-sm btn-warning">Batalkan
                                                        Pembayaran</button>
                                                </form>
                                            @else 
                                                <small>
                                                    *Konfirmasi pembayaran jika sudah menerima pembayaran dari customer
                                                </small>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Bukti Pembayaran</th>
                                        <td>
                                            @if ($order->payment_proof)
                                                <a href="{{ asset('storage/orders/payment_proofs/' . $order->payment_proof) }}"
                                                    target="_blank">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa-solid fa-image"></i> Lihat Bukti Pembayaran
                                                    </button>
                                                </a>
                                            @else
                                                <span class="badge bg-danger">Belum Diupload</span>
                                            @endif
                                        </td>
                                        <td>
                                            <small>
                                                *Upload bukti pembayaran jika status pembayaran belum lunas
                                            </small>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            {{-- Detail Produk Pesanan --}}
                            <div class="col-12">
                                <tr>
                                    <h4>Detail Produk Pesanan</h4>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            <tr>
                                                @foreach ($order->products as $product)
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->pivot->quantity }}</td>
                                                    <td>Rp {{ number_format($product->price) }}</td>
                                                    <td>Rp {{ number_format($product->price * $product->pivot->quantity) }}</td>
                                                @endforeach
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
