<x-layout>
    <x-header></x-header>
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1>Guru</h1>
                        <p class="mb-0">Kami bangga memiliki tenaga pendidik yang berpengalaman, kompeten, dan penuh
                            semangat. Setiap guru memiliki latar belakang pendidikan yang kuat serta keahlian di
                            bidangnya masing-masing. Melalui metode pembelajaran inovatif, mereka siap membantu siswa
                            dalam mencapai tujuan akademik maupun pribadi.</p>
                        {{-- ini description --}}
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Guru</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Trainers Section -->
    <section id="trainers" class="section trainers">

        <div class="container">

            <div class="row gy-5">

                @foreach ($teachers as $teacher)
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="member-img">
                            <img src="{{ asset('storage/' . $teacher->img_teacher) }}" class="img-fluid" alt="">
                            <div class="social">
                                <a href="{{ $teacher->twitter_url }}"><i class="bi bi-twitter-x"></i></a>
                                <a href="{{ $teacher->facebook_url }}"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $teacher->instagram_url }}"><i class="bi bi-instagram"></i></a>
                                <a href="{{ $teacher->linkedin_url }}"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="text-center member-info">
                            <h4>{{ $teacher->name }}</h4>
                            <span>{{ $teacher->position }}</span>
                            <p>{!! $teacher->description !!}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </section><!-- /Trainers Section -->
    <x-footer></x-footer>
</x-layout>
