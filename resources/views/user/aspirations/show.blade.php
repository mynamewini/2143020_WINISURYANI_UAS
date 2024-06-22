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
                        <a href="{{ route('aspirations.index') }}" class="btn btn-primary float-end">Kembali</a>
                    </div>

                    {{-- Tabel Detail Keluhan --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <th colspan="2" class="bg-warning text-dark">
                                    <h6 class="mt-2">Data Pengirim</h6>
                                </th>
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
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $aspiration->address }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        {{-- Pending, Approved, Rejected --}}
                                        @if ($aspiration->status == 'pending')
                                            <span class="badge bg-warning text-dark">
                                                Sedang Diproses
                                            </span>
                                        @elseif ($aspiration->status == 'approved')
                                            <span class="badge bg-success">
                                                Ditanggapi
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <th class="bg-primary">
                                    <h6 class="mt-2">Keluhan Pelanggan</h6>
                                </th>
                                <tr>
                                    <td>
                                        {{ $aspiration->aspiration }}
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <th class="bg-success">
                                    <h6 class="mt-2">Balasan dari Administrator</h6>
                                </th>
                                <tr>
                                    <td class="py-4">
                                        {{ $aspiration->reply }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
