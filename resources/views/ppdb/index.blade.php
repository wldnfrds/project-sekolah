<x-layout>
    <x-header></x-header>
    <form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="container mt-5">
            <h3 class="mb-4 text-center">Formulir Pendaftaran Online SMKS Pasundan Cijulang</h3>
            @if (session('error'))
                <div class="mt-3 alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Informasi Pribadi -->
            <div class="mb-4 shadow card">
                <div class="card-header">
                    <h5 class="mt-2 fw-bold"><i class="fas fa-user fa-lg"></i>
                        Informasi Pribadi Calon Siswa</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="full_name" class="form-label fw-bold"><i class="fas fa-id-card"></i> Nama
                                Lengkap</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label fw-bold"><i class="fas fa-venus-mars"></i> Jenis
                                Kelamin</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="birth_place" class="form-label fw-bold"><i class="fas fa-map-marker-alt"></i>
                                Tempat Lahir</label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="birth_date" class="form-label fw-bold"><i class="fas fa-calendar-alt"></i>
                                Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="religion" class="form-label fw-bold"><i class="fas fa-pray"></i> Agama</label>
                            <select class="form-select" id="religion" name="religion" required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="address" class="form-label fw-bold"><i class="fas fa-home"></i> Alamat
                                Lengkap</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="phone_number" class="form-label fw-bold"><i class="fas fa-phone"></i> Nomor
                                Telepon/HP</label>
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="8xxxxxxxxxx" required>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label fw-bold"><i class="fas fa-envelope"></i> Email (jika
                                ada)</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Orang Tua/Wali -->
            <div class="mb-4 shadow card">
                <div class="card-header">
                    <h5 class="mt-2 fw-bold"><i class="fas fa-users fa-lg"></i> Informasi Orang Tua/Wali</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="father_name" class="form-label fw-bold"><i class="fas fa-male"></i> Nama
                                Ayah/Wali</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="father_job" class="form-label fw-bold"><i class="fas fa-briefcase"></i>
                                Pekerjaan Ayah/Wali</label>
                            <input type="text" class="form-control" id="father_job" name="father_job" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="mother_name" class="form-label fw-bold"><i class="fas fa-female"></i> Nama
                                Ibu/Wali</label>
                            <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="mother_job" class="form-label fw-bold"><i class="fas fa-briefcase"></i>
                                Pekerjaan
                                Ibu/Wali</label>
                            <input type="text" class="form-control" id="mother_job" name="mother_job" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="parent_phone" class="form-label fw-bold"><i class="fas fa-phone"></i> Nomor
                                Telepon/HP
                                Orang Tua/Wali</label>
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input type="tel" class="form-control" id="parent_phone" name="parent_phone"
                                    placeholder="8xxxxxxxxxx" required>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="parent_address" class="form-label fw-bold"><i class="fas fa-home"></i> Alamat
                                Orang
                                Tua/Wali</label>
                            <textarea class="form-control" id="parent_address" name="parent_address" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Pendidikan Sebelumnya -->
            <div class="mb-4 shadow card">
                <div class="card-header">
                    <h5 class="mt-2 fw-bold"><i class="fas fa-school fa-lg"></i> Informasi Pendidikan Sebelumnya</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="previous_school" class="form-label fw-bold"><i class="fas fa-school"></i>
                                Nama Sekolah Asal</label>
                            <input type="text" class="form-control" id="previous_school" name="previous_school"
                                required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="graduation_year" class="form-label fw-bold"><i
                                    class="fas fa-graduation-cap"></i>
                                Tahun Lulus</label>
                            <input type="number" class="form-control" id="graduation_year" name="graduation_year"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="school_address" class="form-label fw-bold"><i class="fas fa-home"></i> Alamat
                            Sekolah Asal</label>
                        <textarea class="form-control" id="school_address" name="school_address" rows="3" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Pilihan Jurusan -->
            <div class="mb-4 shadow card">
                <div class="card-header">
                    <h5 class="mt-2 fw-bold"><i class="fas fa-list fa-lg"></i> Pilihan Jurusan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="first_major" class="form-label fw-bold"><i class="fas fa-list"></i> Pilihan
                                Jurusan 1</label>
                            <select class="form-select" id="first_major" name="first_major" required>
                                <option value="">Pilih Jurusan</option>
                                <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                                <option value="TKR">Teknik Kendaraan Ringan (TKR)</option>
                                <option value="BDP">Bisnis Daring dan Pemasaran (BDP)</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="second_major" class="form-label fw-bold"><i class="fas fa-list"></i> Pilihan
                                Jurusan 2</label>
                            <select class="form-select" id="second_major" name="second_major" required>
                                <option value="">Pilih Jurusan</option>
                                <option value="RPL">Rekayasa Perangkat Lunak (RPL)</option>
                                <option value="TKR">Teknik Kendaraan Ringan (TKR)</option>
                                <option value="BDP">Bisnis Daring dan Pemasaran (BDP)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Berkas Pendukung -->
            <div class="mb-4 shadow card">
                <div class="card-header">
                    <h5 class="mt-2 fw-bold"><i class="fas fa-file"></i> Berkas Pendukung (Upload File)</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="birth_certificate" class="form-label fw-bold d-flex align-items-center">
                                <i class="fas fa-file-alt me-2"></i> Scan/Fotokopi Akta Kelahiran
                            </label>
                            <input type="file" class="form-control" id="birth_certificate"
                                name="birth_certificate" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="family_card" class="form-label fw-bold d-flex align-items-center">
                                <i class="fas fa-users me-2"></i> Scan/Fotokopi Kartu Keluarga (KK)
                            </label>
                            <input type="file" class="form-control" id="family_card" name="family_card" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="diploma_or_skl" class="form-label fw-bold d-flex align-items-center">
                                <i class="fas fa-graduation-cap me-2"></i> Scan/Fotokopi Ijazah/SKL (Jika sudah
                                tersedia)
                            </label>
                            <input type="file" class="form-control" id="diploma_or_skl" name="diploma_or_skl">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="photo" class="form-label d-flex fw-bold align-items-center">
                                <i class="fas fa-camera me-2"></i> Foto Raport (Format JPG/PNG, Max. 2 MB)
                            </label>
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="health_certificate" class="form-label fw-bold d-flex align-items-center">
                                <i class="fas fa-file-medical-alt me-2"></i> Surat Keterangan Sehat (Jika diperlukan)
                            </label>
                            <input type="file" class="form-control" id="health_certificate"
                                name="health_certificate">
                        </div>
                    </div>
                </div>
            </div>


            <!-- Informasi Tambahan -->
            <div class="mb-4 shadow card">
                <div class="mt-2 card-header">
                    <h5 class="fw-bold"><i class="fas fa-info-circle me-2"></i> Informasi Tambahan (Opsional)</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="achievements" class="form-label fw-bold d-flex align-items-center">
                            <i class="fas fa-trophy me-2"></i> Prestasi yang pernah diraih (Jika ada)
                        </label>
                        <textarea class="form-control" id="achievements" name="achievements" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="reason_major" class="form-label fw-bold d-flex align-items-center">
                            <i class="fas fa-lightbulb me-2"></i> Alasan memilih jurusan yang dipilih
                        </label>
                        <textarea class="form-control" id="reason_major" name="reason_major" rows="3"></textarea>
                    </div>
                </div>
            </div>


            <!-- Pernyataan dan Persetujuan -->
            <div class="mb-4 shadow card">
                <div class="mt-2 card-header">

                    <h5 class="fw-bold"> <i class="fas fa-handshake me-2"></i>Pernyataan dan Persetujuan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input @error('statement') is-invalid @enderror"
                            id="statement" name="statement" value="1" required>
                        <label class="form-check-label d-flex align-items-center" for="statement">
                            <i class="fas fa-info-circle me-2"></i> Saya menyatakan bahwa semua informasi yang saya
                            berikan
                            adalah benar dan dapat dipertanggungjawabkan.
                        </label>
                        @error('statement')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @error('agreement') is-invalid @enderror"
                            id="agreement" name="agreement" value="1" required>
                        <label class="form-check-label d-flex align-items-center" for="agreement">
                            <i class="fas fa-check-circle me-2"></i> Saya menyetujui data yang diberikan digunakan
                            untuk proses pendaftaran di SMKS Pasundan Cijulang.
                        </label>
                        @error('agreement')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Tombol Kirim -->
            <div class="mt-4 mb-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-primary shadow-blue">Kirim Formulir</button>
            </div>
        </div>
    </form>
    <x-footer></x-footer>
</x-layout>
