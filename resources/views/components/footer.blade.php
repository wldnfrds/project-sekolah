<footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">SMKS Pasundan Cijulang</span>
                </a>
                <div class="pt-3 footer-contact">
                    <p>Jl. Cijulang No. 222,</p>
                    <p>Cijulang, Jawa Barat</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>(0265)633169 </span></p>
                    <p><strong>Email:</strong> <span>smkpasundancijulang.sch@gmail.com</span></p>
                </div>
                <div class="mt-4 social-links d-flex">
                    <a href="https://x.com/PasundanCjl"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.facebook.com/pasundan.cijulang/?_rdr"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/smkpasundancijulang/"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.tiktok.com/@pasci95official"><i class="bi bi-tiktok"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Tautan Berguna</h4>
                <ul>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Persyaratan layanan</a></li>
                    <li><a href="#">Kebijakan privasi</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="{{ route('rpl') }}">Rekayasa perangkat Lunak</a></li>
                    <li><a href="{{ route('tkr') }}">Teknik Kendaraan Ringan</a></li>
                    <li><a href="{{ route('bdp') }}">Bisnis Daring dan pemasaran</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Buletin kami</h4>
                <p>Berlangganan buletin kami dan dapatkan berita terbaru tentang kegiatan sekolah, informasi
                    akademik, serta
                    program unggulan di SMKS Pasundan Cijulang!</p>
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <div class="newsletter-form">
                        <input type="email" name="email" placeholder="Masukkan email Anda" required>
                        <button type="submit">Berlangganan</button>
                </form>
            </div>

        </div>
    </div>

    <div class="container mt-4 text-center copyright">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">SMKS Pasundan Cijulang</strong> <span>Semua Hak
                Disimpan</span></p>
        <div class="credits">
            Designed by <a href="https://instagram.com/wldnfrds____">Wldnfrds</a>
        </div>

</footer>
