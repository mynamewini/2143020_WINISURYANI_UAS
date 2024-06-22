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

                    {{-- Tombol kembali --}}
                    <div class="card-header">
                        <a href="{{ route('admin.aspirations.index') }}" class="btn btn-primary float-end">Kembali</a>
                    </div>

                    {{-- Tabel Detail Keluhan --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $aspiration->name }}</td>
                                </tr>
                                <tr>
                                    <th>No. Telepon</th>
                                    <td>{{ $aspiration->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat Pada : </th>
                                    <td>
                                        {{ $aspiration->created_at->format('d F Y H:i') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $aspiration->email }}</td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <th>
                                    <h6>Aspirasi</h6>
                                </th>
                                <tr>
                                    <td>
                                        {{ $aspiration->aspiration }}
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <th>
                                    <h6>Respon</h6>
                                </th>
                                <tr>
                                    {{-- Form Reply --}}
                                    <form action="{{ route('admin.aspirations.update', $aspiration->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td>
                                            {{-- update_at --}}
                                            <input type="hidden" name="updated_at" value="{{ now() }}">
                                            {{-- status --}}
                                            <input type="hidden" name="status" value="approved">
                                            <textarea name="reply" class="form-control" rows="5" required>{{ $aspiration->reply }}</textarea>
                                            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                                        </td>
                                    </form>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
