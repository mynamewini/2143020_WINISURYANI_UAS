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
                            <li class="breadcrumb-item"><a href="{{ route('user.products.index') }}">Produk</a></li>
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
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('storage/products/' . $product->photo) }}" alt="{{ $product->name }}" class="img-fluid rounded">
                            </div>
                            <div class="col-8">
                                <h2 class="mb-4">
                                    {{ $product->name }}
                                    {{-- Back --}}
                                    <a href="{{ route('user.products.index') }}" class="btn btn-danger float-end ms-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                                    {{-- Order --}}
                                    <a href="{{ route('user.orders.create', $product->id) }}" class="btn btn-primary float-end"><i class="fa-solid fa-cart-plus"></i> Pesan</a>
                                </h2>
                                {{-- table --}}
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>
                                                @foreach ($categories as $category)
                                                    @if ($category->id == $product->category_id)
                                                        {{ $category->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>{{ $product->stock }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>{{ $product->description }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
