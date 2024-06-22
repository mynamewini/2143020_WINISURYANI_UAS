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
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah User</a>
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
                            {{-- Table Admin List --}}
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role == 'user')
                                                <span class="badge bg-success">
                                                    Pelanggan
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">{{ $user->role }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Detail Button --}}
                                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-secondary">Detail</a>
                                            {{-- Edit Button --}}
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            {{-- Delete Button --}}
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
