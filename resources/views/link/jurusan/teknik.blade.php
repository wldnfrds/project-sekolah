<x-layout>
    <x-header></x-header>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1>Teknik Kendaraan Ringan<br></h1>
                        <p class="mb-0">Jurusan Teknik Kendaraan Ringan di SMKS Pasundan Cijulang menawarkan program
                            pendidikan yang mempersiapkan siswa menjadi teknisi otomotif handal. Program ini
                            mengkombinasikan teori otomotif dengan praktik langsung di bengkel, sehingga siswa mampu
                            menangani perbaikan dan perawatan kendaraan ringan dengan kompetensi tinggi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Jurusan<br></li>
                    <li class="current">Teknik Kendaraan Ringan<br></li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- About Us Section -->
    <section id="about-us" class="section about-us">

        <div class="container">

            <div class="row gy-4">

                <div class="order-1 col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/img/sekolah/jurusan/logo-jurusan-tkr-removebg-preview.png') }}"
                        class="ims-5 img-fluid" alt="">
                </div>

                <div class="order-2 col-lg-6 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Fokus pembelajaran</h3>
                    {{-- <p class="fst-italic">
                        Nyunda, Nyantri, Nyakola, Nyantika.
                    </p> --}}
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Perawatan dan perbaikan sistem kendaraan
                                ringan</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Teknologi mesin otomotif terkini</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Diagnostik kerusakan kendaraan</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Pengelasan dan teknik pemeliharaan</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Sistem elektronik kendaraan (EFI)</span></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="page-title-j" data-aos="fade">
            <div class="heading">
                <div class="container mt-5">
                    <div class="text-center row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h3 class="text-dark mb-3 fw-bold">Keunggulan Jurusan TKR</h3>
                            <ul class="list-unstyled text-dark">
                                <li class="mb-2">
                                    <i class="bi bi-tools fs-5 text-primary me-2"></i>
                                    Bengkel otomotif <span class="fst-italic">modern</span> dengan alat-alat canggih.
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-car-front fs-5 text-success me-2"></i>
                                    Pelatihan langsung menggunakan kendaraan aktual.
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-patch-check fs-5 text-warning me-2"></i>
                                    Program sertifikasi nasional di bidang otomotif.
                                </li>
                                <li>
                                    <i class="bi bi-building fs-5 text-info me-2"></i>
                                    Kegiatan praktik di bengkel resmi dan mitra industri.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section><!-- /About Us Section -->

    <x-footer></x-footer>
</x-layout>
