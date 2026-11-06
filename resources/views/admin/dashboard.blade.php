
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard Admin TechClass - Sistem Informasi Pendaftaran Kelas Pelatihan Teknologi">

    <title>Dashboard Admin | TechClass</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon"
          href="{{ asset('admin/assets/favicon-9EIT7vLh.ico') }}">

    {{-- CSS Kiaalap --}}
    <link rel="stylesheet"
          href="{{ asset('admin/assets/main-BV-wpnXD.css') }}">

    <link rel="stylesheet"
          href="{{ asset('admin/assets/main-DVYj-QCH.css') }}">

    <link rel="stylesheet"
          href="{{ asset('admin/assets/charts-layout-C732DjRu.css') }}">

    {{-- JavaScript Kiaalap --}}
    <script type="module"
            src="{{ asset('admin/assets/main-ZZRh_wak.js') }}"></script>
</head>

<body>

@php
    use Illuminate\Support\Facades\DB;

    // Statistik dashboard
    $totalKelas = DB::table('kelas')->count();

    $totalKelasAktif = DB::table('kelas')
        ->where('status', 'published')
        ->count();

    $totalPendaftar = DB::table('pendaftaran')->count();

    $pendaftarPending = DB::table('pendaftaran')
        ->where('status_pendaftaran', 'pending')
        ->count();

    $pendaftarDiterima = DB::table('pendaftaran')
        ->where('status_pendaftaran', 'accepted')
        ->count();

    // Lima pendaftar terbaru
    $pendaftarTerbaru = DB::table('pendaftaran')
        ->join('kelas', 'pendaftaran.id_kelas', '=', 'kelas.id_kelas')
        ->select(
            'pendaftaran.nama_pendaftar',
            'pendaftaran.email',
            'pendaftaran.status_pendaftaran',
            'pendaftaran.created_at',
            'kelas.judul_kelas'
        )
        ->orderByDesc('pendaftaran.created_at')
        ->limit(5)
        ->get();

    // Lima kelas dengan pendaftar terbanyak
    $kelasPopuler = DB::table('kelas')
        ->leftJoin(
            'pendaftaran',
            'kelas.id_kelas',
            '=',
            'pendaftaran.id_kelas'
        )
        ->select(
            'kelas.id_kelas',
            'kelas.judul_kelas',
            'kelas.instruktur',
            'kelas.status',
            DB::raw('COUNT(pendaftaran.id_pendaftaran) as jumlah_pendaftar')
        )
        ->groupBy(
            'kelas.id_kelas',
            'kelas.judul_kelas',
            'kelas.instruktur',
            'kelas.status'
        )
        ->orderByDesc('jumlah_pendaftar')
        ->limit(5)
        ->get();

    // Data grafik pendaftaran 7 hari terakhir
    $grafikPendaftaran = collect(range(6, 0))
        ->map(function ($hari) {
            $tanggal = now()->subDays($hari);

            return [
                'tanggal' => $tanggal->format('d M'),
                'jumlah' => DB::table('pendaftaran')
                    ->whereDate('created_at', $tanggal->toDateString())
                    ->count(),
            ];
        });

    // Nilai tertinggi untuk menentukan tinggi batang grafik
    $maksPendaftar = max(1, $grafikPendaftaran->max('jumlah'));
@endphp

{{-- Sidebar --}}
<div class="search-backdrop" id="searchBackdrop"></div>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">

    <div class="sidebar-header">
        <div class="sidebar-brand">
            <h5>
                <i class="bi bi-mortarboard-fill"></i>
                TechClass
            </h5>

            <button type="button"
                    class="sidebar-close"
                    id="sidebarClose"
                    aria-label="Tutup sidebar">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>

    <nav class="sidebar-nav" aria-label="Navigasi admin">

        <div class="menu-section">
            <div class="menu-section-title">Menu Utama</div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link active">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Manajemen</div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.kelas.index') }}" class="nav-link">
                        <i class="bi bi-book"></i>
                        <span>Data Kelas</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.kategori.index') }}" class="nav-link">
                        <i class="bi bi-tags"></i>
                        <span>Kategori Kelas</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pendaftar.index') }}" class="nav-link">
                        <i class="bi bi-people"></i>
                        <span>Data Pendaftar</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="menu-section">
            <div class="menu-section-title">Lainnya</div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('landing') }}" class="nav-link">
                        <i class="bi bi-globe"></i>
                        <span>Lihat Website</span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</aside>

{{-- Main Wrapper --}}
<div class="main-wrapper" id="mainWrapper">

    {{-- Header --}}
    <header class="navbar top-navbar">
        <div class="container-fluid d-flex align-items-center h-100">

            <button type="button"
                    class="hamburger-menu"
                    id="sidebarToggle"
                    aria-label="Buka menu">
                <i class="bi bi-list"></i>
            </button>

            <nav class="d-none d-lg-block ms-3">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>

            <div class="navbar-brand d-lg-none fw-bold me-auto">
                TechClass
            </div>

            <div class="flex-grow-1 d-none d-lg-block"></div>

            <div class="d-flex align-items-center gap-2">

                <div class="dropdown">
                    <button type="button"
                            class="btn btn-light d-flex align-items-center"
                            data-bs-toggle="dropdown">
                        <span class="user-avatar me-2">
                            A
                        </span>

                        <span class="d-none d-md-inline">Administrator</span>

                        <i class="bi bi-chevron-down ms-1"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <span class="dropdown-item-text">
                                <strong>{{ session('admin_nama', 'Administrator') }}</strong>
                                <br>
                                <small class="text-muted">admin@gmail.com</small>
                            </span>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item" href="{{ route('landing') }}">
                                <i class="bi bi-globe me-2"></i>
                                Lihat Website
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        {{-- Logout --}}
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                        class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </header>

    {{-- Dashboard Content --}}
    <main class="dashboard-content" id="main-content">

        <div class="container-fluid">

            {{-- Judul --}}
            <div class="mb-4">
                <h1 class="h3 font-bold">Dashboard Overview</h1>

                <p class="text-muted text-sm">
                    Selamat datang di halaman administrasi TechClass.
                    Kelola kelas dan pendaftaran peserta melalui dashboard ini.
                </p>
            </div>

            {{-- Statistik --}}
            <div class="dashboard-row">

                <div class="dashboard-grid grid-cols-4">

                    <div class="stats-card">
                        <div class="stats-card-label">
                            Total Kelas
                        </div>

                        <div class="stats-card-value">
                            {{ $totalKelas }}
                        </div>

                        <span class="stats-card-change positive">
                            Seluruh kelas
                        </span>

                        <div class="progress-custom">
                            <div class="progress-bar-custom bg-primary"
                                 style="width: 100%">
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-card-label">
                            Kelas Dipublikasikan
                        </div>

                        <div class="stats-card-value">
                            {{ $totalKelasAktif }}
                        </div>

                        <span class="stats-card-change positive">
                            Kelas aktif
                        </span>

                        <div class="progress-custom">
                            <div class="progress-bar-custom bg-success"
                                 style="width: {{ $totalKelas > 0 ? ($totalKelasAktif / $totalKelas) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-card-label">
                            Total Pendaftar
                        </div>

                        <div class="stats-card-value">
                            {{ $totalPendaftar }}
                        </div>

                        <span class="stats-card-change positive">
                            Seluruh pendaftar
                        </span>

                        <div class="progress-custom">
                            <div class="progress-bar-custom bg-info"
                                 style="width: 100%">
                            </div>
                        </div>
                    </div>

                    <div class="stats-card">
                        <div class="stats-card-label">
                            Menunggu Konfirmasi
                        </div>

                        <div class="stats-card-value">
                            {{ $pendaftarPending }}
                        </div>

                        <span class="stats-card-change positive">
                            Status pending
                        </span>

                        <div class="progress-custom">
                            <div class="progress-bar-custom bg-warning"
                                 style="width: {{ $totalPendaftar > 0 ? ($pendaftarPending / $totalPendaftar) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Grafik dan Statistik --}}
            <div class="dashboard-row">

                <div class="dashboard-grid grid-cols-3"
                     style="grid-template-columns: 2fr 1fr;">

                    {{-- Grafik Pendaftaran 7 Hari Terakhir --}}
                    <div class="chart-wrapper">

                        <div class="dashboard-card-header">
                            <div>
                                <h5 class="dashboard-card-title">
                                    Statistik Pendaftaran
                                </h5>

                                <small class="text-muted">
                                    Jumlah pendaftar per hari dalam 7 hari terakhir
                                </small>
                            </div>
                        </div>

                        <div style="padding: 25px 20px 20px;">

                            <div style="
                                height: 280px;
                                display: flex;
                                align-items: stretch;
                                justify-content: space-around;
                                gap: 12px;
                                padding: 10px 10px 0;
                                border-bottom: 1px solid #dee2e6;
                                background: repeating-linear-gradient(
                                    to bottom,
                                    transparent,
                                    transparent 54px,
                                    #eeeeee 55px
                                );
                            ">

                                @foreach ($grafikPendaftaran as $item)

                                    <div style="
                                        flex: 1;
                                        height: 100%;
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: flex-end;
                                        align-items: center;
                                        min-width: 0;
                                    ">

                                        <span class="small fw-bold mb-2">
                                            {{ $item['jumlah'] }}
                                        </span>

                                        <div style="
                                            width: 65%;
                                            max-width: 55px;
                                            height: {{ ($item['jumlah'] / $maksPendaftar) * 85 }}%;
                                            min-height: {{ $item['jumlah'] > 0 ? '5px' : '0' }};
                                            background: #0d6efd;
                                            border-radius: 6px 6px 0 0;
                                            transition: height 0.3s ease;
                                        "></div>

                                        <span class="small text-muted mt-2">
                                            {{ $item['tanggal'] }}
                                        </span>

                                    </div>

                                @endforeach

                            </div>

                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    Jumlah Pendaftar (Orang)
                                </small>
                            </div>

                        </div>

                    </div>

                    {{-- Ringkasan Pendaftar --}}
                    <div style="display:flex; flex-direction:column; gap:24px;">

                        <div class="stats-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <div class="stats-card-label">
                                        Pendaftar Diterima
                                    </div>

                                    <div class="stats-card-value">
                                        {{ $pendaftarDiterima }}
                                    </div>
                                </div>

                                <i class="bi bi-check-circle text-success"
                                   style="font-size:24px;"></i>
                            </div>
                        </div>

                        <div class="stats-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <div class="stats-card-label">
                                        Pendaftar Pending
                                    </div>

                                    <div class="stats-card-value">
                                        {{ $pendaftarPending }}
                                    </div>
                                </div>

                                <i class="bi bi-clock-history text-warning"
                                   style="font-size:24px;"></i>
                            </div>
                        </div>

                        <div class="stats-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <div class="stats-card-label">
                                        Total Pendaftar
                                    </div>

                                    <div class="stats-card-value">
                                        {{ $totalPendaftar }}
                                    </div>
                                </div>

                                <i class="bi bi-people text-info"
                                   style="font-size:24px;"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Aktivitas Terbaru dan Kelas Populer --}}
            <div class="dashboard-grid grid-cols-2">

                {{-- Pendaftar Terbaru --}}
                <div class="dashboard-card">

                    <div class="dashboard-card-header d-flex justify-content-between align-items-center">

                        <h5 class="dashboard-card-title mb-0">
                            Pendaftar Terbaru
                        </h5>

                        <span class="badge bg-primary">
                            5 Terbaru
                        </span>

                    </div>

                    <div class="dashboard-card-body">

                        <div class="list-group list-group-flush">

                            @forelse ($pendaftarTerbaru as $pendaftar)

                                <div class="list-group-item d-flex align-items-center px-0 py-3">

                                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3"
                                         style="width:40px;height:40px;flex-shrink:0;">
                                        <i class="bi bi-person"></i>
                                    </div>

                                    <div class="flex-grow-1">

                                        <h6 class="mb-1">
                                            {{ $pendaftar->nama_pendaftar }}
                                        </h6>

                                        <small class="text-muted">
                                            {{ $pendaftar->judul_kelas }}
                                        </small>

                                        <div class="small text-muted">
                                            {{ $pendaftar->email }}
                                        </div>

                                    </div>

                                    @if ($pendaftar->status_pendaftaran === 'accepted')
                                        <span class="badge bg-success">
                                            Diterima
                                        </span>
                                    @elseif ($pendaftar->status_pendaftaran === 'rejected')
                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>
                                    @endif

                                </div>

                            @empty

                                <div class="text-center py-4">
                                    <i class="bi bi-inbox text-muted"
                                       style="font-size:35px;"></i>

                                    <p class="text-muted mt-2 mb-0">
                                        Belum ada pendaftar.
                                    </p>
                                </div>

                            @endforelse

                        </div>

                    </div>
                </div>

                {{-- Kelas Populer --}}
                <div class="dashboard-card">

                    <div class="dashboard-card-header">
                        <h5 class="dashboard-card-title mb-0">
                            Kelas Populer
                        </h5>
                    </div>

                    <div class="dashboard-card-body">

                        <div class="list-group list-group-flush">

                            @forelse ($kelasPopuler as $kelas)

                                <div class="list-group-item d-flex align-items-center px-0 py-3">

                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                         style="width:40px;height:40px;flex-shrink:0;">
                                        <i class="bi bi-book"></i>
                                    </div>

                                    <div class="flex-grow-1">

                                        <h6 class="mb-1">
                                            {{ $kelas->judul_kelas }}
                                        </h6>

                                        <small class="text-muted">
                                            Instruktur:
                                            {{ $kelas->instruktur }}
                                        </small>

                                        <div class="small text-muted">
                                            {{ $kelas->jumlah_pendaftar }}
                                            pendaftar
                                        </div>

                                    </div>

                                    <span class="badge bg-success">
                                        {{ $kelas->status === 'published' ? 'Aktif' : 'Draft' }}
                                    </span>

                                </div>

                            @empty

                                <div class="text-center py-4">
                                    <i class="bi bi-book text-muted"
                                       style="font-size:35px;"></i>

                                    <p class="text-muted mt-2 mb-0">
                                        Belum ada kelas.
                                    </p>
                                </div>

                            @endforelse

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </main>

    {{-- Footer --}}
    <footer class="dashboard-footer">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">
                    <p class="mb-0">
                        &copy; {{ date('Y') }} TechClass.
                        All rights reserved.
                    </p>
                </div>

                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        Sistem Informasi Pendaftaran Kelas TechClass
                    </p>
                </div>

            </div>

        </div>
    </footer>

</div>

</body>
</html>