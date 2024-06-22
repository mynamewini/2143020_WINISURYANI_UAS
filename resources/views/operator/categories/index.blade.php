@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Table operator.categories --}}
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="panel-heading mb-4">
                        <div class="right">
                            <a href="{{ route('operator.categories.create') }}" class="btn btn-primary">Tambah Data</a>
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
                                    <th>Nama Kategori</th>
                                    <th>Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            {{ $item->products->count() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('operator.categories.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('operator.categories.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
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
