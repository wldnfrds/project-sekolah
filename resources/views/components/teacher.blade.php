<section id="trainers-index" class="section trainers-index">

    <div class="container">

        <div class="row">
            {{-- team member --}}
            @foreach ($teachers as $guru)
                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="{{ asset('storage/' . $guru->img_teacher) }}" class="img-fluid w-100" alt="Img Guru">
                        <div class="member-content">
                            <h4>{{ $guru->name }}</h4>
                            <span>{{ $guru->position }}</span>
                            <p>{!! $guru->description !!}
                            </p>
                            <div class="social">
                                <a href="{{ $guru->twitter_url }}"><i class="bi bi-twitter-x"></i></a>
                                <a href="{{ $guru->facebook_url }}"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $guru->instagram_url }}"><i class="bi bi-instagram"></i></a>
                                <a href="{{ $guru->linkedin_url }}"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- End Team Member -->

        </div>

    </div>

</section>
