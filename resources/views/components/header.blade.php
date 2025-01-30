<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('assets/img/sekolah/logo-smk.jpg') }}" class="" alt="SMKS Pasundan Cijulang">
            <h1 class="sitename d-none d-md-block">SMKS PASUNDAN</h1>
            <h2 class="sitename fw-bold text-primary d-block d-md-none">SMKS <br /> PASUNDAN</h4>
        </a>


        <!-- Navigation Menu -->
        <nav id="navmenu" class="navmenu">
            <ul class="navmenu">
                <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda<br></a></li>
                <li><a href="{{ route('tentang') }}" class="{{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
                </li>
                <li><a href="{{ route('guru') }}" class="{{ request()->is('guru') ? 'active' : '' }}">Guru</a></li>
                <li><a href="{{ route('acara') }}" class="{{ request()->is('acara') ? 'active' : '' }}">Berita</a></li>
                <li class="dropdown">
                    <a href="#" class="{{ request()->is('jurusan*') ? 'active' : '' }}">
                        <span>Jurusan</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li><a href="{{ route('rpl') }}" class="{{ request()->is('rpl') ? 'active' : '' }}">Rekayasa
                                Perangkat Lunak</a></li>
                        <li><a href="/jurusan/teknik-kendaraan-ringan"
                                class="{{ request()->is('jurusan/teknik-kendaraan-ringan') ? 'active' : '' }}">Teknik
                                Kendaraan Ringan</a></li>
                        <li><a href="/jurusan/bisnis-daring-dan-pemasaran"
                                class="{{ request()->is('jurusan/bisnis-daring-dan-pemasaran') ? 'active' : '' }}">Bisnis
                                Daring dan Pemasaran</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('kontak') }}" class="{{ request()->is('kontak') ? 'active' : '' }}">Kontak</a>
                </li>

                <!-- Profile Menu - Now part of mobile nav -->
                @auth
                    <li class="d-xl-none dropdown">
                        <!-- Profile Link -->
                        <a href="#" class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/ユーザーアイコンさんメーカー.jpg') }}" alt="Profile"
                                class="rounded-circle me-2" width="40" height="40">
                            <span>{{ auth()->user()->name }}</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>

                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu">
                            @if (auth()->user()->role === 'admin')
                                <li>
                                    <a class="dropdown-item" href="{{ route('filament.admin.pages.dashboard') }}">
                                        <i class="bi bi-house-door me-2"></i> Dashboard Admin
                                    </a>
                                </li>
                            @elseif(auth()->user()->role === 'student' || auth()->user()->role === 'user')
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('filament.murid.resources.form-submits.index') }}">
                                        <i class="bi bi-house-door me-2"></i> Dashboard Murid
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('student.dashboard') }}">
                                        <i class="bi bi-bell me-2"></i> Notifikasi
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('filament.murid.resources.testimonis.index') }}"
                                        class="dropdown-item">
                                        <i class="bi bi-chat-dots me-2"></i> Testimoni
                                    </a>
                                </li>
                            @endif

                            <!-- Logout -->
                            <li>
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                                <button type="button" class="dropdown-item" id="logout-button">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </li>
                        </ul>
                    </li>

                    <!-- Logout Script -->
                    <script>
                        document.getElementById('logout-button').addEventListener('click', function(e) {
                            e.preventDefault();
                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: "Anda akan keluar dari sesi ini.",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, logout!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('logout-form').submit();
                                }
                            });
                        });
                    </script>
                @endauth
            </ul>

            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <!-- Desktop Profile Menu -->
        @auth
            <div class="dropdown ms-auto d-none d-xl-block">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                    id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/img/ユーザーアイコンさんメーカー.jpg') }}" alt="Profile" class="rounded-circle"
                        width="40" height="40">
                    <span class="ms-2">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li>
                        @if (auth()->check() && auth()->user()->role === 'admin')
                            <a class="dropdown-item" href="{{ route('filament.admin.pages.dashboard') }}">
                                <i class="bi bi-house-door me-2"></i> Dashboard Admin
                            </a>
                        @elseif(auth()->check() && (auth()->user()->role === 'student' || auth()->user()->role === 'user'))
                            <a class="dropdown-item" href="{{ route('filament.murid.resources.form-submits.index') }}">
                                <i class="bi bi-house-door me-2"></i> Dashboard Murid
                            </a>

                    <li>
                        <a class="dropdown-item" href="{{ route('student.dashboard') }}">
                            <i class="bi bi-bell me-2"></i> Notifikasi
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('filament.murid.resources.testimonis.index') }}" class="dropdown-item">
                            <i class="bi bi-chat-dots me-2"></i> Testimoni
                        </a>
                    </li>
                    @endif
                    </li>

                    <li>
                        <button id="logoutButton" class="dropdown-item">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </li>
                </ul>

                <script>
                    // Logout SweetAlert
                    document.getElementById('logoutButton').addEventListener('click', function(e) {
                        e.preventDefault(); // Mencegah aksi default tombol

                        Swal.fire({
                            title: 'Konfirmasi Logout',
                            text: "Apakah Anda yakin ingin logout?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Logout!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Submit form logout jika dikonfirmasi
                                const form = document.createElement('form');
                                form.method = 'POST';
                                form.action = "{{ route('logout') }}";

                                // Tambahkan CSRF token ke dalam form
                                const csrfToken = document.createElement('input');
                                csrfToken.type = 'hidden';
                                csrfToken.name = '_token';
                                csrfToken.value = '{{ csrf_token() }}';

                                form.appendChild(csrfToken);
                                document.body.appendChild(form);
                                form.submit();
                            }
                        });
                    });
                </script>

            </div>
        @else
            <a class="btn-getstarted ms-auto" href="{{ route('login') }}">Masuk</a>
        @endauth
    </div>
</header>
