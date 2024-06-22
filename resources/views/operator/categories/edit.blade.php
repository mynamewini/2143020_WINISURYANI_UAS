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
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Form --}}
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('operator.categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="name">Nama Kategori</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>            
        </section>
    </div>
@endsection
