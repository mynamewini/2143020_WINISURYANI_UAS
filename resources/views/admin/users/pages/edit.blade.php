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
                        {{-- Tombol Kembali ke halaman sebelumnya dengan Javascript --}}
                        <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Form Edit User --}}
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- Alert --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        @endif
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- Name & Usename --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ $user->username }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- Email --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                                {{-- Phone --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $user->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- Password & Confirm Passowrd --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- Role --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" id="role" name="role">
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>
                                                Operator</option>
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Pelanggan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection
