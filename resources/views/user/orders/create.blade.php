@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>Checkout</h3>
    </div>
    <div class="page-content">
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form id="checkoutForm" action="{{ route('user.orders.store', $product->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <h5>
                                Data Penerima
                            </h5>

                            <hr>

                            {{-- Nama Penerima --}}
                            <div class="form-group mb-3">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control mt-2" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- HIdden User ID --}}
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            </div>

                            {{-- Hidden Type --}}
                            <input type="hidden" name="type" value="satuan">

                            {{-- No. Telepon --}}
                            <div class="form-group mb-3">
                                <label for="phone">No. Telepon</label>
                                <input type="text" class="form-control mt-2" id="phone" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Alamat --}}
                            <div class="form-group mb-3">
                                <label for="address">Alamat</label>
                                <textarea class="form-control mt-2" id="address" name="address">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- CS Notes --}}
                            <div class="form-group mb-3">
                                <label for="customer_notes">Deskripsi</label>
                                <textarea class="form-control mt-2" id="customer_notes" name="customer_notes">{{ old('customer_notes') }}</textarea>
                                @error('customer_notes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h5>
                                Detail Pesanan
                            </h5>

                            <hr>

                            {{-- Nama Produk --}}
                            <div class="form-group mb-3">
                                <label for="product">Nama Produk</label>
                                <input type="text" class="form-control mt-2" id="product"
                                    value="{{ $product->name }}" readonly>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </div>

                            {{-- Stok --}}
                            <div class="form-group mb-3">
                                <label for="stock">Stok</label>
                                <input type="text" class="form-control mt-2" id="stock"
                                    value="{{ $product->stock }}" readonly>
                            </div>

                            {{-- Harga --}}
                            <div class="form-group mb-3">
                                <label for="price">Harga</label>
                                <input type="text" class="form-control mt-2" id="price"
                                    value="{{ $product->price }}" readonly>
                            </div>

                            <div class="row">
                                {{-- Jumlah --}}
                            <div class="col-md-6 form-group mb-3">
                                <label for="quantity">Jumlah</label>
                                <input type="number" class="form-control mt-2" id="quantity" name="quantity"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Total Harga --}}
                            <div class="col-md-6 form-group mb-3">
                                <label for="total">Total Harga</label>
                                <input type="text" class="form-control mt-2" id="total" name="total"
                                    value="{{ old('total') }}" readonly>
                            </div>
                            </div>

                        </div>
                    </div>
                    <hr>

                    {{-- Submit --}}
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Include mask.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        // Hitung total harga otomatis dengan jQuery
        $('#quantity').on('input', function() {
            let quantity = $(this).val();
            let price = $('#price').val().replace(/\./g, '');
            let total = quantity * price;
            $('#total').val(total);
        });

        // Format rupiah dengan jQuery dengan koma
        $('#price').mask('000.000.000', {
            reverse: true
        });
        $('#total').mask('000.000.000', {
            reverse: true
        });
    </script>
@endsection
