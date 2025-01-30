<x-layout>
    <x-header></x-header>

    @if (auth()->check())
        @php
            $user = auth()->user();
            $formSubmit = App\Models\FormSubmit::where('user_id', $user->id)->first();
        @endphp

        <div class="container mt-5">
            @if ($formSubmit)
                <div class="text-center alert">
                    @if ($formSubmit->status == 'verified')
                        <div class="text-dark">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="mb-3 icon-container">
                                    <i class="fas fa-check-circle text-success fa-4x"></i>
                                </div>
                                <h1 class="text-dark fw-bold">SELAMAT</h1>
                                <p class="lead">Anda diterima di SMKS Pasundan Cijulang</p>
                                <a href="{{ route('filament.murid.resources.form-submits.index') }}"
                                    class="btn btn-outline-primary shadow-green"> Informasi
                                    lebih lanjut.</a>
                            </div>
                        </div>
                    @elseif($formSubmit->status == 'pending')
                        <div class="text-dark">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="mb-3 icon-container">
                                    <i class="fas fa-hourglass-half fa-4x"></i>
                                </div>
                                <h1 class="fw-bold">Formulir Anda Terkirim</h1>
                                <p class="lead">Saat ini sedang dalam pengecekan oleh Tim.</p>
                                <a href="{{ route('filament.murid.resources.form-submits.index') }}"
                                    class="btn btn-outline-success">Konfirmasi
                                    Disini <i class="bi bi-house fa-lg"></i></a>
                            </div>
                        </div>
                    @elseif($formSubmit->status == 'rejected')
                        <div class=" text-dark">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="mb-3 icon-container">
                                    <i class="fas fa-times-circle text-danger fa-4x"></i>
                                </div>
                                <h1 class="fw-bold">TIDAK LOLOS</h1>
                                <p class="lead">Mohon maaf, pendaftaran Anda tidak diterima.</p>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="text-center alert">
                    <div class="py-5 text-white bg-light">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <div class="mb-3 icon-container">
                                <i class="fas fa-exclamation-triangle fa-4x text-dark"></i>
                            </div>
                            <h1 class="fw-bold">ANDA BELUM MELAKUKAN PENDAFTARAN</h1>
                            <p class="lead text-dark">Silakan <a href="{{ route('ppdb') }}"
                                    class="btn btn-outline-info">daftar
                                    sekarang</a> untuk melanjutkan.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        <div class="container mt-5">
            <div class="text-center alert">
                <div class="text-white shadow-sm card bg-info">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <div class="mb-3 icon-container">
                            <i class="fas fa-sign-in-alt fa-4x"></i>
                        </div>
                        <h1 class="fw-bold">Harap login terlebih dahulu</h1>
                        <p class="lead">Anda perlu <a href="{{ route('login') }}" class="mt-3 btn btn-secondary">login
                                sekarang</a> untuk melihat status.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif




    <x-footer></x-footer>
</x-layout>
