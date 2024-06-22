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

                        <div class="table-responsive">
                            <table class="table table-hover table-borderless" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aspirasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aspirations as $aspiration)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $aspiration->name }}</td>
                                            <td>{{ $aspiration->email }}</td>
                                            <td>
                                                {{ Str::limit($aspiration->aspiration, 50) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('operator.aspirations.show', $aspiration->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                                {{-- <form action="{{ route('operator.aspirations.destroy', $aspiration->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form> --}}
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
