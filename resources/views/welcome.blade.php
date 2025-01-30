<x-layout>

    <x-header></x-header>

    <!-- Hero Section -->
    <x-hero></x-hero>
    <!-- /Hero Section -->

    <!-- About Section -->
    <x-about></x-about>
    <!-- /About Section -->

    <!-- Counts Section -->
    <x-count :$usersCount :$newsCount :$teachersCount></x-count>
    <!-- /Counts Section -->

    <!-- majors Section -->
    <x-majors></x-majors>
    <!-- /majors Section -->

    <!-- guru Index Section -->
    <x-teacher :$teachers />
    <!-- /guru Index Section -->

    {{-- testi --}}
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
                                    <h4>{{ ucwords(str_replace('_', ' ', $testi->info)) }}</h4>
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
    {{-- end testi --}}


    <x-footer></x-footer>

</x-layout>
