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
                            <li class="breadcrumb-item"><a href="{{ route('operator.products.index') }}">Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Form --}}
            <div class="col-md-12">
                <div class="card p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body no-padding">
                        <form action="{{ route('operator.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="name">Nama Produk</label>
                                        <input type="text" name="name" id="name" class="form-control mt-1" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="category_id">Kategori</label>
                                        <select name="category_id" id="category_id" class="form-control mt-1" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="price">
                                            Harga
                                        </label>
                                        <input type="number" name="price" id="price" class="form-control mt-1" required>
                                        <small class="text-muted">*tulis dalam Rupiah tanpa titik</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2">
                                        <label for="stock">Stok</label>
                                        <input type="number" name="stock" id="stock" class="form-control mt-1" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control mt-1" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="photo">Foto</label>
                                <input type="file" name="photo" id="photo" class="form-control mt-1" required>
                                <small>
                                    *foto harus berformat jpg, jpeg, atau png dan ukuran maksimal 2MB
                                </small>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
