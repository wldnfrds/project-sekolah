<x-layout>
    <x-header></x-header>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1>Berita</h1>
                        <p class="mb-0">platform yang digunakan untuk menyajikan informasi terkini, kegiatan, dan
                            peristiwa penting di lingkungan sekolah. Di halaman ini, siswa, guru, dan orang tua dapat
                            menemukan berbagai informasi seputar acara sekolah, prestasi siswa, pengumuman penting,
                            serta kegiatan ekstrakurikuler yang diadakan. Halaman berita ini bertujuan untuk menjaga
                            komunikasi yang aktif antara sekolah dengan seluruh komunitasnya, memberikan edukasi, serta
                            memotivasi siswa untuk terus berkontribusi dan meraih prestasi.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">beranda</a></li>
                    <li class="current">Berita</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Events Section -->
    <section class="news-section py-5 bg-light">
        <div class="container" data-aos="fade-up">
            <div class="row g-4">
                @foreach ($news as $n)
                    <div class="col-md-4">
                        <article class="card h-100 border-0 shadow-sm hover-shadow transition-300">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $n->img_news) }}" class="card-img-top object-fit-cover"
                                    style="height: 240px;" alt="{{ $n->title }}">
                                <div class="position-absolute bottom-0 start-0 w-100 p-3 text-white"
                                    style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                                    <span class="badge bg-primary">Berita</span>
                                    <small class="ms-2">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ $n->created_at->locale('id')->isoFormat('D MMMM Y') }}
                                    </small>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title mb-3">
                                    <a href="{{ route('news.show', $n->id) }}"
                                        class="text-decoration-none text-dark stretched-link hover-primary">
                                        {{ $n->title }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($n->content), 150) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 p-4 pt-0">
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .hover-shadow {
            transition: all 0.3s ease-in-out;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .hover-primary:hover {
            color: #0d6efd !important;
        }

        .transition-300 {
            transition: all 0.3s ease;
        }

        .avatar-sm {
            width: 40px;
            height: 40px;
            overflow: hidden;
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>

    <!-- /Events Section -->
    <x-footer></x-footer>
</x-layout>
