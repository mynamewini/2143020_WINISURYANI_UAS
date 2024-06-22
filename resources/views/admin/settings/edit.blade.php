@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Form Edit Settings --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        Detail Toko
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        Pembayaran
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">
                                        Sosial Media
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">

                                {{-- Detail Toko --}}
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="form-group row">
                                        {{-- Site_name --}}
                                        <label for="site_name" class="col-sm-2 col-form-label">Site Name</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="site_name" name="site_name"
                                                value="{{ $setting->site_name }}">
                                        </div>

                                        {{-- Description --}}
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            {{-- Textarea --}}
                                            <textarea class="form-control" id="description" name="site_description" rows="3">{{ $setting->site_description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        {{-- Email & Phone --}}
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $setting->email }}">
                                        </div>

                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="{{ $setting->phone }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        {{-- Address & Maps --}}
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $setting->address }}">
                                        </div>

                                        <label for="maps" class="col-sm-2 col-form-label">Maps</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="maps" name="maps"
                                                value="{{ $setting->maps }}">
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="logo" name="logo">
                                        </div>
                                    </div> --}}
                                </div>

                                {{-- Pembayaran --}}
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab" tabindex="0">

                                    {{-- Alert --}}
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <strong>
                                            Jelaskan cara pembayaran yang bisa digunakan oleh pelanggan!
                                        </strong><br><br>
                                        <span>Contoh :</span><br>
                                        <p>
                                            Pembayaran bisa dilakukan melalui transfer ke rekening BCA 1234567890 a/n
                                            Toko Rotiku.
                                        </p>
                                    </div>

                                    <div class="form-group row">
                                        {{-- Bank Name --}}
                                        <label for="bank_name" class="col-sm-2 col-form-label">
                                            Pembayaran
                                        </label>
                                        {{-- Textarea --}}
                                        <div class="col-12 col-sm-10">
                                            <textarea class="form-control" id="bank_name" name="payment" rows="3">{{ $setting->payment }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                {{-- Sosial Media --}}
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab" tabindex="0">

                                    <div class="form-group row">
                                        {{-- Facebook --}}
                                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="facebook" name="facebook"
                                                value="{{ $setting->facebook }}">
                                        </div>

                                        {{-- Instagram --}}
                                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="instagram" name="instagram"
                                                value="{{ $setting->instagram }}">
                                        </div>

                                        {{-- Twitter --}}
                                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" id="twitter" name="twitter"
                                                value="{{ $setting->twitter }}">
                                        </div>

                                        {{-- Tiktok --}}
                                        <label for="tiktok" class="col-sm-2 col-form-label">Tiktok</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="tiktok" name="tiktok"
                                                value="{{ $setting->tiktok }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{-- Button Submit --}}
                            <div class="form-group row mt-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    <a href="{{ route('admin.settings.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
