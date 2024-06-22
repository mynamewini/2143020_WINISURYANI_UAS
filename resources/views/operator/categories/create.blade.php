@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>
                        {{$title}}
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('operator.categories.index')}}">Katalog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Table operator.categories --}}
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="panel-body no-padding">
                        <form action="{{ route('operator.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Katalog</label>
                                <input type="text" name="name" id="name" class="form-control mt-1" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control mt-1" required></textarea>
                            </div>
                            
                            {{-- Submit & Cancel --}}
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
