@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Table admin.categories --}}
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="panel-heading mb-4">
                        <div class="right">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                    <div class="panel-body no-padding">

                        {{-- Alert --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @else
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        @endif

                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/products/' . $item->photo) }}"
                                                alt="{{ $item->name }}" width="100">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($category->id == $item->category_id)
                                                    {{ $category->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ 'Rp ' . number_format($item->price, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            @if ($item->stock > 0)
                                                {{ $item->stock }}
                                            @else
                                                <span class="badge bg-danger">Stok Habis</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.show', $item->id) }}"
                                                class="btn btn-secondary">Detail</a>
                                            <a href="{{ route('admin.products.edit', $item->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
