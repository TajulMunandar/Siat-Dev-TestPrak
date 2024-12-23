<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="{{ asset('theme.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Form</title>
    <style>
        body {
            background: linear-gradient(to right, #F6FB7A, #B4E380);
            font-family: "roboto"
        }
    </style>
</head>

<body class="bg-light">
    <!-- container -->
    <div class="container d-flex flex-column my-5">
        <div class="row align-items-center justify-content-center g-0
        min-vh-100">
            <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
                <!-- Card -->
                <div class="card smooth-shadow-md">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <p class="mb-3">Masukkan informasi akun anda!</p>
                        </div>

                        <!-- Form -->
                        <form method="POST" action="{{ route('submit') }}">
                            @csrf <!-- Laravel CSRF protection -->

                            <!-- name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" class="form-control" name="nama"
                                    placeholder="Nama" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" id="nik" class="form-control" name="nik"
                                    placeholder="NIK" required>
                                @error('nik')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                                    placeholder="Tempat Lahir" required>
                                @error('tempat_lahir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                                    placeholder="User Name" required="">
                                @error('tanggal_lahir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- jk --}}
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select id="jk" class="form-control" name="jk" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="LAKI-LAKI">Laki-laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                </select>
                                @error('jk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select class="form-select select2" id="provinsi" name="provinsi">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provins as $provinsi)
                                        <option value="{{ $provinsi->name }}">{{ $provinsi->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <select class="form-select select2" id="kabupaten" name="kabupaten">
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach ($kabupatens as $kabupaten)
                                        <option value="{{ $kabupaten->name }}">{{ $kabupaten->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select class="form-select select2" id="kecamatan" name="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->name }}">{{ $kecamatan->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="desa" class="form-label">Desa</label>
                                <select class="form-select select2" id="desa" name="desa">
                                    <option value="">Pilih Desa</option>
                                    @foreach ($desas as $desa)
                                        <option value="{{ $desa->name }}">{{ $desa->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="fulan@example.com" required="">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="**************" required="">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                    name="password_confirmation" placeholder="**************" required="">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="captcha">Masukkan CAPTCHA:</label>
                                <input type="text" id="captcha" name="captcha" required>
                                <img src="{{ asset('storage/captcha/captcha.jpg') }}" alt="Captcha Image">
                            </div>

                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning text-white">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2
            $('.select2').select2();


        });
    </script>
</body>

</html>
