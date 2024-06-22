@extends('layouts.home')

@section('content')

  {{-- Hero --}}
  @include('components.home.hero')

  {{-- About --}}
  @include('components.home.about')

  {{-- Stats --}}
  @include('components.home.stats')

  {{-- Menu --}}
  @include('components.home.products')

  {{-- Testimonial --}}
  @include('components.home.testimoni')

  {{-- Contacts --}}
  @include('components.home.contact')

@endsection