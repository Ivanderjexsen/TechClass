
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TechClass | Kelas Pelatihan Teknologi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            color: #1d4ed8;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            color: #475569;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-menu a:hover {
            color: #2563eb;
        }

        .nav-button {
            background: #2563eb;
            color: white !important;
            padding: 11px 20px;
            border-radius: 8px;
        }

        .hero {
            padding: 100px 8%;
            background: linear-gradient(120deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
        }

        .hero-content {
            max-width: 650px;
        }

        .hero-label {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 30px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.2;
            margin-bottom: 22px;
            color: #0f172a;
        }

        .hero h1 span {
            color: #2563eb;
        }

        .hero p {
            color: #64748b;
            font-size: 16px;
            max-width: 540px;
            margin-bottom: 30px;
        }

        .hero-button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 14px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.2s;
        }

        .hero-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .hero-visual {
            width: 360px;
            min-height: 300px;
            border-radius: 24px;
            background: linear-gradient(145deg, #2563eb, #1e40af);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 35px;
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.2);
        }

        .hero-visual .symbol {
            font-size: 75px;
            margin-bottom: 15px;
        }

        .hero-visual h2 {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .hero-visual p {
            color: #dbeafe;
            font-size: 14px;
            margin: 0;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 45px 8%;
            background: white;
        }

        .feature {
            padding: 20px;
            text-align: center;
        }

        .feature h3 {
            color: #1e40af;
            margin-bottom: 8px;
            font-size: 17px;
        }

        .feature p {
            color: #64748b;
            font-size: 14px;
        }

        .container {
            padding: 80px 8%;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-heading span {
            color: #2563eb;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-heading h2 {
            font-size: 32px;
            margin: 10px 0;
            color: #0f172a;
        }

        .section-heading p {
            color: #64748b;
            font-size: 15px;
        }

        .daftar-kelas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            transition: 0.25s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        /* FOTO CARD KELAS */
        .card-top {
            height: 180px;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: #1d4ed8;
            font-size: 42px;
        }

        .card-top img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .card-content {
            padding: 23px;
        }

        .kategori {
            display: inline-block;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 5px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 13px;
        }

        .card h3 {
            font-size: 19px;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .card-description {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 18px;
            min-height: 60px;
        }

        .instruktur {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .card-bottom {
            border-top: 1px solid #e2e8f0;
            padding-top: 17px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .harga {
            font-weight: bold;
            color: #1d4ed8;
            font-size: 15px;
        }

        .tombol {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 9px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: bold;
        }

        .tombol:hover {
            background: #1d4ed8;
        }

        .empty-state {
            grid-column: 1 / -1;
            background: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            color: #64748b;
        }

        .pagination {
            margin-top: 35px;
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        .pagination nav > div:first-child {
            display: none;
        }

        .pagination nav > div:last-child {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .pagination a,
        .pagination span[aria-current="page"] span,
        .pagination span[aria-disabled="true"] span {
            display: inline-block;
            padding: 8px 13px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background: white;
            color: #475569;
            font-size: 13px;
        }

        .pagination span[aria-current="page"] span {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .footer {
            background: #0f172a;
            color: white;
            padding: 45px 8% 20px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .footer h3 {
            color: #60a5fa;
            margin-bottom: 10px;
        }

        .footer p {
            color: #cbd5e1;
            font-size: 14px;
        }

        .copyright {
            text-align: center;
            border-top: 1px solid #334155;
            padding-top: 20px;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 18px 5%;
            }

            .nav-menu {
                gap: 12px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .hero {
                padding: 65px 6%;
                flex-direction: column;
                align-items: flex-start;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero-visual {
                width: 100%;
            }

            .features {
                grid-template-columns: 1fr;
                padding: 30px 6%;
            }

            .container {
                padding: 60px 6%;
            }

            .section-heading h2 {
                font-size: 26px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .hero h1 {
                font-size: 31px;
            }

            .card-bottom {
                align-items: flex-start;
                flex-direction: column;
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

        <div class="nav-menu">
            <a href="{{ route('landing') }}">Beranda</a>
            <a href="#kelas">Daftar Kelas</a>
            <a href="#tentang">Tentang</a>

            @if (session()->has('admin_id'))
                <a href="{{ route('admin.dashboard') }}" class="nav-button">
                    Dashboard
                </a>
            @else
                <a href="{{ route('admin.login') }}" class="nav-button">
                    Login
                </a>
            @endif
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <span class="hero-label">
                PLATFORM PELATIHAN TEKNOLOGI
            </span>

            <h1>
                Tingkatkan Skill,
                <span>Bangun Masa Depan</span>
                Digitalmu.
            </h1>

            <p>
                Temukan berbagai kelas pelatihan teknologi yang dirancang
                untuk membantu kamu mengembangkan kemampuan dan mempersiapkan
                diri menghadapi dunia digital.
            </p>

            <a href="#kelas" class="hero-button">
                Jelajahi Kelas &rarr;
            </a>
        </div>

        <div class="hero-visual">
            <div>
                <div class="symbol">&#60;/&#62;</div>
                <h2>Learn. Practice. Grow.</h2>
                <p>Mulai perjalanan belajar teknologi bersama TechClass.</p>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN -->
    <section class="features" id="tentang">
        <div class="feature">
            <h3>Materi Terarah</h3>
            <p>Pelajari materi sesuai bidang teknologi yang kamu minati.</p>
        </div>

        <div class="feature">
            <h3>Beragam Pilihan Kelas</h3>
            <p>Temukan pelatihan dari berbagai kategori teknologi.</p>
        </div>

        <div class="feature">
            <h3>Pengembangan Skill</h3>
            <p>Tingkatkan kemampuan untuk menghadapi kebutuhan digital.</p>
        </div>
    </section>

    <!-- DAFTAR KELAS -->
    <section class="container" id="kelas">

        <div class="section-heading">
            <span>PROGRAM PELATIHAN</span>
            <h2>Temukan Kelas Pilihanmu</h2>
            <p>Pilih kelas yang sesuai dengan minat dan tujuan belajarmu.</p>
        </div>

        <div class="daftar-kelas">

            @forelse ($kelas as $item)

                <div class="card">

                    <!-- FOTO KELAS -->
                    <div class="card-top">
                        @if ($item->gambar)
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul_kelas }}"
                            >
                        @else
                            &#60;/&#62;
                        @endif
                    </div>

                    <div class="card-content">

                        <span class="kategori">
                            {{ $item->kategori->nama_kategori ?? 'Umum' }}
                        </span>

                        <h3>{{ $item->judul_kelas }}</h3>

                        <p class="card-description">
                            {{ $item->deskripsi }}
                        </p>

                        <p class="instruktur">
                            Instruktur: {{ $item->instruktur }}
                        </p>

                        <div class="card-bottom">

                            <span class="harga">
                                @if ($item->harga == 0)
                                    Gratis
                                @else
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                @endif
                            </span>

                            <a
                                href="{{ route('kelas.detail', $item->id_kelas) }}"
                                class="tombol"
                            >
                                Lihat Detail
                            </a>

                        </div>

                    </div>
                </div>

            @empty

                <div class="empty-state">
                    <h3>Belum Ada Kelas Tersedia</h3>
                    <p>Silakan kunjungi kembali nanti untuk melihat kelas terbaru.</p>
                </div>

            @endforelse

        </div>

        <div class="pagination">
            {{ $kelas->links() }}
        </div>

    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-content">

            <div>
                <h3>TechClass.</h3>
                <p>Platform pendaftaran kelas pelatihan teknologi.</p>
            </div>

            <div>
                <h3>Navigasi</h3>
                <p><a href="{{ route('landing') }}" style="color: #cbd5e1;">Beranda</a></p>
                <p><a href="#kelas" style="color: #cbd5e1;">Daftar Kelas</a></p>
                <p><a href="#tentang" style="color: #cbd5e1;">Tentang Kami</a></p>
            </div>

        </div>

        <div class="copyright">
            &copy; {{ date('Y') }} TechClass. Seluruh hak cipta dilindungi.
        </div>

    </footer>

</body>
</html>
