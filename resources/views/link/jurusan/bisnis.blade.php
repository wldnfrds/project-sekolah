<x-layout>
    <x-header></x-header>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1>Bisnis Daring dan Pemasaran<br></h1>
                        <p class="mb-0">Jurusan Bisnis Daring dan Pemasaran di SMKS Pasundan Cijulang dirancang untuk
                            membekali siswa dengan keterampilan dalam bidang bisnis online dan pemasaran digital.
                            Program ini memberikan pengetahuan mendalam tentang strategi bisnis modern yang mampu
                            bersaing di pasar digital global.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Jurusan<br></li>
                    <li class="current">Bisnis Daring dan Pemasaran<br></li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- About Us Section -->
    <section id="about-us" class="section about-us">

        <div class="container">

            <div class="row gy-4">

                <div class="order-1 col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/img/sekolah/jurusan/logo-jurusan-bdp-removebg-preview.png') }}"
                        class="ims-5 img-fluid" alt="">
                </div>

                <div class="order-2 col-lg-6 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Fokus pembelajaran</h3>
                    {{-- <p class="fst-italic">
                        Nyunda, Nyantri, Nyakola, Nyantika.
                    </p> --}}
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Strategi pemasaran online</span></li>
                        <li><i class="bi bi-check-circle"></i> <span><span class="fst-italic">E-commerce</span> dan
                                manajemen toko online.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Analisis pasar digital</span></li>
                        <li><i class="bi bi-check-circle"></i> <span><span class="fst-italic">Content marketing</span>
                                dan SEO</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Pengelolaan media sosial untuk bisnis</span></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="page-title-j" data-aos="fade">
            <div class="heading">
                <div class="container mt-5">
                    <div class="text-center row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h3 class="text-dark mb-3 fw-bold">Keunggulan Jurusan BDP</h3>
                            <ul class="list-unstyled text-dark">
                                <li class="mb-2">
                                    <i class="bi bi-mortarboard fs-5 text-primary me-2"></i>
                                    Kelas belajar dengan pendekatan <span class="fst-italic">blended learning</span>
                                    (kombinasi online atau offline).
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-diagram-3 fs-5 text-success me-2"></i>
                                    Pengajaran berbasis nyata dan studi kasus bisnis.
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-globe fs-5 text-warning me-2"></i>
                                    Pelatihan penggunaan <span class="fst-italic">platform</span> bisnis digital.
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
