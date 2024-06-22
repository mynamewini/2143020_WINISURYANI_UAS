@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>{{ $title }}</h3>
    </div>
    <div class="page-content">

        {{-- Tombol Edit --}}
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ route('admin.settings.edit', $settings->id) }}" class="btn btn-primary">
                    <i class="fa-solid fa-edit"></i>
                    Perbarui Pengaturan
                </a>
            </div>
        </div>

        <section class="row">

            

            {{-- Detail Settings --}}
            <div class="col-md-6">
                <div class="card py-4 px-4">
                    <div class="panel">
                        <h5>
                            Detail Toko
                        </h5>
                        <hr>
                        <div class="panel-body no-padding">
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa-solid fa-store"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Nama Toko :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{ $settings->site_name }}
                                    </span>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="row mt-3">
                                <div class="col-1">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Deskripsi Toko :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{ $settings->site_description }}
                                    </span>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="row mt-3">
                                <div class="col-1">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Email :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{ $settings->email }}
                                    </span>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="row mt-3">
                                <div class="col-1">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Whatsapp :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{-- Whatsapp --}}
                                        <a href="https://wa.me/{{ $settings->phone }}">
                                            Hubungi Sekarang
                                        </a>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Social Media --}}
                <div class="card py-4 px-4">
                    <div class="panel">
                        <div class="panel-body no-padding">
                            <h5>Sosial Media</h5>
                            <hr>

                            {{-- Facebook --}}
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa-brands fa-facebook"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Facebook :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{-- Facbook.com/ ... --}}
                                        <a href="https://web.facebook.com/{{ $settings->facebook }}" target="_blank">
                                            {{ $settings->facebook }}
                                        </a>
                                    </span>
                                </div>
                            </div>

                            {{-- INstagram --}}
                            <div class="row mt-3">
                                <div class="col-1">
                                    <i class="fa-brands fa-instagram"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Instagram :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{-- Instagram.com/ ... --}}
                                        <a href="https://www.instagram.com/{{ $settings->instagram }}" target="_blank">
                                            {{ $settings->instagram }}
                                        </a>
                                    </span>
                                </div>
                            </div>

                            {{-- Tiktok --}}
                            <div class="row mt-3">
                                <div class="col-1">
                                    <i class="fa-brands fa-tiktok"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Tiktok :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{-- Tiktok.com/ ... --}}
                                        <a href="https://www.tiktok.com/{{ $settings->tiktok }}" target="_blank">
                                            {{ $settings->tiktok }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Alamat, Maps dan Logo --}}
            <div class="col-md-6">
                <div class="card py-4 px-4">
                    <div class="panel">
                        <div class="panel-body no-padding">
                            <h5>Alamat Toko</h5>
                            <hr>

                            {{-- Alamat --}}
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa-solid fa-map-marker"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Alamat :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{ $settings->address }}
                                    </span>
                                </div>
                            </div>

                            {{-- Maps --}}
                            <div class="row mt-3">
                                <div class="col-1">
                                    <i class="fa-solid fa-map"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Maps :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{-- Maps --}}
                                        <a href="{{ $settings->maps }}" target="_blank">
                                            Lihat Maps
                                        </a>
                                    </span>
                                </div>
                            </div>

                            {{-- Logo --}}
                            {{-- <div class="row mt-3">
                                <div class="col-1">
                                    <i class="fa-solid fa-image"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Logo :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" width="100">
                                    </span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card py-4 px-4">
                    <div class="panel">
                        <div class="panel-body no-padding">
                            <h5>Deskripsi Pembayaran</h5>
                            <hr>

                            {{-- Pembayaran --}}
                            <div class="row">
                                <div class="col-1">
                                    <i class="fa-solid fa-money-bill"></i>
                                </div>
                                <div class="col-4">
                                    <strong>
                                        Pembayaran :
                                    </strong>
                                </div>
                                <div class="col-7">
                                    <span>
                                        {{ $settings->payment }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
