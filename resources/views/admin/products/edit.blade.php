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
                            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Form --}}
            <div class="col-12 col-md-12 col-lg-12">
                {{-- Alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Produk</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $product->name }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="category_id">Kategori</label>
                                        <select name="category_id" id="category_id" class="form-select" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="price">Harga</label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="{{ $product->price }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="stock">Stok</label>
                                        <input type="number" name="stock" id="stock" class="form-control"
                                            value="{{ $product->stock }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="photo">Foto</label>
                                        <input type="file" name="photo" id="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" id="description" class="form-control" rows="5" required>{{ $product->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-floppy-disk"></i> Perbarui
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
