<x-layout>
    <x-header></x-header>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1>Rekayasa perangkat Lunak<br></h1>
                        <p class="mb-0">Jurusan Rekayasa Perangkat Lunak di SMKS Pasundan Cijulang merupakan pilihan
                            ideal bagi siswa yang berminat dalam dunia teknologi dan pengembangan software. Program ini
                            memadukan pembelajaran teori dengan praktik langsung, sehingga siswa mampu menguasai
                            berbagai keterampilan teknis dan pengembangan aplikasi berbasis web maupun mobile.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Jurusan<br></li>
                    <li class="current">Rekayasa Perangkat Lunak<br></li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- About Us Section -->
    <section id="about-us" class="section about-us">

        <div class="container">

            <div class="row gy-4">

                <div class="order-1 col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('assets/img/sekolah/jurusan/logo-jurusan-rpl-removebg-preview.png') }}"
                        class="ims-5 img-fluid" alt="">
                </div>

                <div class="order-2 col-lg-6 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Fokus pembelajaran</h3>
                    {{-- <p class="fst-italic">
                        Nyunda, Nyantri, Nyakola, Nyantika.
                    </p> --}}
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Pemrograman dasar dan lanjutan</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Pengembangan aplikasi web dan mobile.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Penggunaan sistem database</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Desain <span class="fst-italic"> user
                                    interface</span> (UI) dan <span class="fst-italic">user experience</span>
                                (UX)</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Implementasi teknologi <span class="fst-italic">
                                    cloud computing</span></span></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="page-title-j" data-aos="fade">
            <div class="heading">
                <div class="container mt-5">
                    <div class="text-center row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h3 class="text-dark mb-3 fw-bold">Keunggulan Jurusan RPL</h3>
                            <ul class="list-unstyled text-dark">
                                <li class="mb-2">
                                    <i class="bi bi-laptop fs-5 text-primary me-2"></i>
                                    Laboratorium komputer lengkap dengan teknologi terkini.
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-briefcase fs-5 text-success me-2"></i>
                                    Pengajaran berbasis proyek dan kerja sama dengan dunia industri.
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-building fs-5 text-warning me-2"></i>
                                    Peluang magang di perusahaan IT terkemuka.
                                </li>
                                <li>
                                    <i class="bi bi-person-check fs-5 text-info me-2"></i>
                                    Tim pengajar berpengalaman di bidang <span class="fst-italic">software
                                        development.</span>
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
