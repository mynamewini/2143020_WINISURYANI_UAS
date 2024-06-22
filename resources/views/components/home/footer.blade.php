<footer id="footer" class="footer">

    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
                <i class="bi bi-geo-alt icon"></i>
                <div>
                    <h4>Alamat Kami</h4>
                    <p>
                        {{ $settings->address }}
                    </p>
                </div>

            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-telephone icon"></i>
                <div>
                    <h4>
                        Hubungi Kami
                    </h4>
                    <p>
                        <strong>Phone:</strong> {{ $settings->phone }} <br>
                        <strong>Email:</strong> {{ $settings->email }} <br>
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
                <i class="bi bi-clock icon"></i>
                <div>
                    <h4>
                        Jam Buka
                    </h4>
                    <p>
                        Dari Senin - Jumat <br>
                        08:00 - 17:00 WIB <br>
                        Sabtu - Minggu <br>
                        08:00 - 15:00 WIB
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
                <h4>Ikuti Kami</h4>
                <div class="social-links d-flex">
                    <a href="{{ $settings->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="{{ $settings->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="{{ $settings->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="{{ $settings->tiktok }}" class="tiktok"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; <strong><span>Rotiku</span></strong>. All Rights Reserved
        </div>
    </div>

</footer><!-- End Footer -->
