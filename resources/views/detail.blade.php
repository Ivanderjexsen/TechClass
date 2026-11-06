
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Kelas | TechClass</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: #ffffff;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
        }

        .logo {
            color: #1d4ed8;
            font-size: 23px;
            font-weight: bold;
        }

        .nav-link {
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-link:hover {
            color: #2563eb;
        }

        .page-header {
            background: linear-gradient(120deg, #eff6ff, #dbeafe);
            padding: 55px 8%;
        }

        .page-header span {
            display: inline-block;
            color: #1d4ed8;
            background: #dbeafe;
            padding: 6px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .page-header h1 {
            font-size: 34px;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #64748b;
            font-size: 15px;
        }

        .main-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 25px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            align-items: start;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
        }

        .card-heading {
            margin-bottom: 25px;
        }

        .card-heading span {
            color: #2563eb;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-heading h2 {
            font-size: 23px;
            color: #0f172a;
            margin-top: 7px;
        }

        .card-heading p {
            font-size: 14px;
            color: #64748b;
            margin-top: 5px;
        }

        .kelas-kategori {
            display: inline-block;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .kelas-judul {
            font-size: 25px;
            color: #0f172a;
            margin-bottom: 20px;
            line-height: 1.35;
        }

        .kelas-info {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .info-icon {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 9px;
            font-weight: bold;
        }

        .info-text small {
            display: block;
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 2px;
        }

        .info-text strong {
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }

        .kelas-deskripsi {
            margin-top: 22px;
        }

        .kelas-deskripsi h3 {
            font-size: 16px;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .kelas-deskripsi p {
            font-size: 14px;
            color: #64748b;
            white-space: pre-line;
        }

        .harga-box {
            margin-top: 25px;
            padding: 18px;
            background: #eff6ff;
            border-radius: 10px;
        }

        .harga-box small {
            color: #64748b;
            font-size: 12px;
        }

        .harga-box h3 {
            color: #1d4ed8;
            font-size: 25px;
            margin-top: 3px;
        }

        .pesan {
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .pesan.success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .pesan.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .pesan.error ul {
            padding-left: 20px;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-group input {
            display: block;
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            color: #1e293b;
            background: #ffffff;
            outline: none;
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .form-group input::placeholder {
            color: #94a3b8;
        }

        .form-note {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 6px;
        }

        .submit-button {
            display: block;
            width: 100%;
            padding: 14px;
            background: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .submit-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .footer {
            background: #0f172a;
            color: #cbd5e1;
            text-align: center;
            padding: 25px 8%;
            margin-top: 60px;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 18px 5%;
            }

            .page-header {
                padding: 45px 6%;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .main-container {
                grid-template-columns: 1fr;
                margin: 25px auto;
                padding: 0 6%;
            }

            .card {
                padding: 23px;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 20px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .kelas-judul {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="{{ route('landing') }}" class="logo">
            TechClass.
        </a>

        <a href="{{ route('landing') }}" class="nav-link">
            &larr; Kembali ke Beranda
        </a>
    </nav>

    <!-- HEADER -->
    <section class="page-header">
        <span>INFORMASI PELATIHAN</span>
        <h1>Detail Kelas</h1>
        <p>Kenali program pelatihan pilihanmu sebelum melakukan pendaftaran.</p>
    </section>

    <!-- MAIN CONTENT -->
    <main class="main-container">

        <!-- DETAIL KELAS -->
        <section class="card">

            <div class="card-heading">
                <span>Informasi Kelas</span>
                <h2>Program Pelatihan</h2>
                <p>Informasi lengkap mengenai kelas yang kamu pilih.</p>
            </div>

            <span class="kelas-kategori">
                {{ $kelas->kategori->nama_kategori ?? 'Umum' }}
            </span>

            <h2 class="kelas-judul">
                {{ $kelas->judul_kelas }}
            </h2>

            <div class="kelas-info">
                <div class="info-icon">I</div>
                <div class="info-text">
                    <small>Instruktur</small>
                    <strong>{{ $kelas->instruktur }}</strong>
                </div>
            </div>

            <div class="kelas-deskripsi">
                <h3>Deskripsi Kelas</h3>
                <p>{{ $kelas->deskripsi }}</p>
            </div>

            <div class="harga-box">
                <small>Biaya Pendaftaran</small>
                <h3>
                    @if ($kelas->harga == 0)
                        Gratis
                    @else
                        Rp {{ number_format($kelas->harga, 0, ',', '.') }}
                    @endif
                </h3>
            </div>

        </section>

        <!-- FORM PENDAFTARAN -->
        <section class="card">

            <div class="card-heading">
                <span>Formulir Pendaftaran</span>
                <h2>Daftar Kelas Sekarang</h2>
                <p>Lengkapi informasi berikut untuk mendaftar kelas.</p>
            </div>

            @if (session('success'))
                <div class="pesan success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="pesan error">
                    <strong>Pendaftaran belum berhasil.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kelas.daftar', $kelas->id_kelas) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_pendaftar">Nama Lengkap</label>
                    <input
                        type="text"
                        id="nama_pendaftar"
                        name="nama_pendaftar"
                        value="{{ old('nama_pendaftar') }}"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        autocomplete="email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input
                        type="text"
                        id="nomor_telepon"
                        name="nomor_telepon"
                        value="{{ old('nomor_telepon') }}"
                        placeholder="Contoh: 081234567890"
                        autocomplete="tel"
                        required
                    >
                    <p class="form-note">
                        Pastikan nomor telepon yang dimasukkan masih aktif.
                    </p>
                </div>

                <button type="submit" class="submit-button">
                    Daftar Sekarang &rarr;
                </button>

            </form>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        &copy; {{ date('Y') }} TechClass. Seluruh hak cipta dilindungi.
    </footer>

</body>
</html>
