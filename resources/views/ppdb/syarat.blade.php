<x-layout>
    <x-header></x-header>
    <div class="container mt-5">
        <!-- Hero Section -->
        <div class="p-5 text-center rounded hero-section bg-light">
            <h1 class="display-4 text-primary"><span class="fw-bold">Selamat Datang <br>
                    di SMKS Pasundan Cijulang</span></h1>
            <p class="lead text-secondary">Bersama kami, raihlah masa depan cerah dengan pendidikan berkualitas dan
                pengalaman belajar yang menyenangkan.</p>

        </div>

        <!-- Image Showcase -->
        <div class="mt-5 d-flex justify-content-center">
            <img src="{{ url('storage/' . $infoPpdb->img) }}" alt="Syartat" class="rounded shadow-lg img-fluid">
        </div>
        <!-- Call-to-Action -->
        <div class="py-4 mt-5 mb-3 rounded text-center text-dark call-to-action bg-light">
            <h3>Ayo Bergabung dengan SMKS Pasundan Cijulang!</h3>
            <p>Kami siap membantu Anda meraih masa depan yang gemilang.</p>
            <div class="mt-4">
                @if (auth()->check())
                    <a href="{{ route('ppdb') }}" class="btn btn-outline-primary shadow-blue">Daftar Sekarang</a>
                @else
                    <button class="btn btn-outline-primary shadow-blue" id="btn-daftar">Daftar Sekarang</button>
                @endif
            </div>
        </div>
    </div>

    <x-footer></x-footer>

    <script>
        document.getElementById('btn-daftar').addEventListener('click', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Harap Login Terlebih Dahulu',
                text: 'Anda perlu login untuk melanjutkan ke pendaftaran.',
                confirmButtonText: 'OK',
                customClass: {
                    popup: 'bg-blue-400', // Menambahkan kelas untuk latar belakang biru
                    confirmButton: 'bg-blue-700 text-white', // Menambahkan kelas untuk tombol konfirmasi biru
                }
            });
        });

        document.getElementById('btn-daftar-cta')?.addEventListener('click', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Harap Login Terlebih Dahulu',
                text: 'Anda perlu login untuk melanjutkan ke pendaftaran.',
                confirmButtonText: 'OK',
                customClass: {
                    popup: 'bg-blue-400', // Menambahkan kelas untuk latar belakang biru
                    confirmButton: 'bg-blue-700 text-white', // Menambahkan kelas untuk tombol konfirmasi biru
                }
            });
        });
    </script>
</x-layout>
