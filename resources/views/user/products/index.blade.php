@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>Produk</h3>
    </div>
    <div class="page-content">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/products/' . $product->photo) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">
                                {{-- Bataso 200 kata --}}
                                {{ Str::limit($product->description, 87) }}
                            </p>
                            <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <hr>
                            <a href="{{ route('user.orders.create', $product->id) }}"
                                class="btn btn-secondary"><i class="fa-solid fa-cart-plus"></i> Pesan</a>
                            <a href="{{ route('user.products.show', $product->id) }}"
                                class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
