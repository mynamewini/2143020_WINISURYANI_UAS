<!-- ======= Stats Counter Section ======= -->
<section id="stats-counter" class="stats-counter">
    <div class="container" data-aos="zoom-out">

        <div class="row gy-4">

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $users->count(); }}" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Pelanggan</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $products->count(); }}" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Produk</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $categories->count(); }}" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Katalog</p>
                </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-md-6">
                <div class="stats-item text-center w-100 h-100">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $orders->count(); }}" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Pesanan</p>
                </div>
            </div><!-- End Stats Item -->

        </div>

    </div>
</section><!-- End Stats Counter Section -->
