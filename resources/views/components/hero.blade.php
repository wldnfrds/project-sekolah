<section id="hero" class="hero section dark-background">

    <img src="assets/img/hero-bg1.jpg" alt="" data-aos="fade-in">

    <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Selamat datang di<br>SMKS Pasundan Cijulang, </h2>
        <p data-aos="fade-up" data-aos-delay="200"> Sekolah kejuruan yang berkomitmen mencetak generasi unggul
            dan
            berdaya saing tinggi. Dengan lingkungan belajar yang nyaman, tenaga pengajar profesional, serta
            fasilitas
            modern, kami siap mendukung siswa mencapai cita-citanya.

            Mari bergabung bersama kami untuk masa depan yang lebih cerah!

        </p>
        <div class="mt-4 d-flex" data-aos="fade-up" data-aos-delay="300">
            @auth
                @php
                    $user = auth()->user();
                    $formSubmit = App\Models\FormSubmit::where('user_id', $user->id)->first();
                @endphp
                @if ($formSubmit)
                    <a href="{{ route('student.dashboard') }}" class="btn-get-started">Hasil Pendaftaran</a>
                @else
                    <a href="{{ route('syarat') }}" class="btn-get-started">Daftar Baru Siswa</a>
                @endif
            @else
                <a href="{{ route('syarat') }}" class="btn-get-started">Daftar Baru Siswa</a>
            @endauth
        </div>

    </div>

</section>
