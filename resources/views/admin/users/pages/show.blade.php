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
                            <li class="breadcrumb-item"><a href="/">Users</a></li>
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
                            {{-- Table Detail User --}}
                            <div class="col-12">
                                <h2 class="mb-4">
                                    {{ $user->name }}
                                    {{-- Back --}}
                                    <a href="javascript:history.back()" class="btn btn-danger float-end ms-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary float-end"><i class="fa-solid fa-pen-to-square"></i> Perbarui</a>
                                </h2>
                                {{-- table --}}
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>
                                                {{-- Badge --}}
                                                @if ($user->role == 'admin')
                                                    <span class="badge bg-primary">Admin</span>
                                                @elseif ($user->role == 'operator')
                                                    <span class="badge bg-secondary">Operator</span>
                                                @elseif ($user->role == 'user')
                                                    <span class="badge bg-success">Pelanggan</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. Telepon</td>
                                            <td>{{ $user->phone }}</td>
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
