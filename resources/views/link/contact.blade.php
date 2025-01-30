<x-layout>
    <x-header></x-header>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h1>Kontak</h1>
                        <p class="mb-0">Di halaman ini, Anda dapat menemukan berbagai informasi kontak yang dapat
                            digunakan untuk berkomunikasi dengan sekolah kami. Kami siap memberikan bantuan, informasi
                            lebih lanjut, atau menjawab segala pertanyaan yang Anda miliki.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="current">Kontak</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3495.429966294517!2d108.46967617443225!3d-7.726651376568159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65bfd43195b591%3A0x3b5eb6d578b605c3!2sSMK%20Pasundan%20Cijulang!5e1!3m2!1sid!2sid!4v1737012009784!5m2!1sid!2sid"
                style="border:0; width: 100%; height: 300px;" allowfullscreen="" loading="lazy"freameborder="0"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="flex-shrink-0 bi bi-geo-alt"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>{!! $contact->address !!}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="flex-shrink-0 bi bi-telephone"></i>
                        <div>
                            <h3>Hubungi Kami</h3>
                            <p>{{ $contact->no_hp }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="flex-shrink-0 bi bi-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p>{{ $contact->email }}</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-8">
                    <form action="{{ route('contact.store') }}" method="POST" class="form" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf <!-- CSRF Token -->
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukkan nama"
                                    required="">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukkan email"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Masukkan subjek"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" name="message" rows="6" placeholder="Tulis pesan" required=""></textarea>
                            </div>

                            <div class="text-center col-md-12">
                                <button type="submit" class="mt-3 shadow-blue btn btn-outline-primary">Kirim
                                    pesan</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div><!-- End Contact Form -->

        </div>

        </div>

    </section>
    <!-- /Contact Section -->

    <x-footer></x-footer>
</x-layout>


<style>
    .form {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-size: 14px;
        color: #333;
        margin-bottom: 6px;
    }

    .form-control {
        border: 1px solid #ccc;
        padding: 12px;
        border-radius: 6px;
        font-size: 16px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    textarea.form-control {
        resize: vertical;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
