@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>
            {{ $title }}
        </h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">

                        {{-- Alert --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Button Tambah --}}
                        <div class="mb-3">
                            <a href="{{ route('aspirations.create') }}" class="btn btn-primary">Tambah Keluhan</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-borderless" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Dibuat</th>
                                        <th>Nama</th>
                                        <th>Aspirasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aspirations as $aspiration)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{-- Hari, TGL - BLN -THN (JAM) --}}
                                                {{ $aspiration->created_at->isoFormat('dddd, Do MMMM YYYY') }}
                                                ({{ $aspiration->created_at->format('H:i') }})
                                            </td>
                                            <td>{{ $aspiration->name }}</td>
                                            <td>
                                                {{ Str::limit($aspiration->aspiration, 50) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('aspirations.show', $aspiration->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                                <form action="{{ route('aspirations.destroy', $aspiration->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
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
