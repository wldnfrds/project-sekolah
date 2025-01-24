<x-layout>
    <x-header></x-header>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1>Tentang Kami<br></h1>
                        <p class="mb-0">{{ $about->description }}</p>
                        {{-- ini descripsi --}}
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Tentang<br></li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- About Us Section -->
    <section id="about-us" class="section about-us">

        <div class="container">

            <div class="row gy-4">

                <div class="order-1 col-lg-6 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ url('storage/' . $about->img) }}" class="rounded img-fluid" alt="">
                </div>

                <div class="order-2 col-lg-6 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Visi Misi</h3>
                    <p class="fst-italic">
                        Nyunda, Nyantri, Nyakola, Nyantika.
                    </p>
                    <ul>
                        <li>Visi:</li>
                        <li><i class="bi bi-check-circle"></i> <span>{{ $about->visi }}</span></li>
                        <li>Misi:</li>
                        @foreach (explode(';', $about->misi) as $misi)
                            <li><i class="bi bi-check-circle"></i> <span>{{ trim($misi) }}</span></li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>

    </section>
    <!-- /About Us Section -->

    <x-count :$usersCount :$newsCount :$teachersCount></x-count>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimoni</h2>
            <p>Apa yang mereka katakan tentang kami</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                  },
                  "1200": {
                    "slidesPerView": 2,
                    "spaceBetween": 20
                  }
                }
              }
            </script>
                <div class="swiper-wrapper">
                    @foreach ($testimoni as $testi)
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="{{ asset('assets/img/ユーザーアイコンさんメーカー.jpg') }}" class="testimonial-img"
                                        alt="">
                                    <h3>{{ $testi->author_name }}</h3>
                                    <h4>Alumni</h4>
                                    <div class="stars">
                                        @for ($i = 0; $i < $testi->rating; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        @for ($i = $testi->rating; $i < 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>{{ $testi->content }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section>
    <!-- /Testimonials Section -->

    <x-footer></x-footer>
</x-layout>
