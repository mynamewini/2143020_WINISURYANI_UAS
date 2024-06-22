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
                    {{-- Form Tambah Keluhan --}}
                    <div class="card-body">
                        <form action="{{ route('aspirations.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control" id="address" name="address" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="aspiration" class="form-label">Pesan Keluhan</label>
                                <textarea class="form-control" id="aspiration" name="aspiration" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <a href="{{ route('aspirations.index') }}" class="btn btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
