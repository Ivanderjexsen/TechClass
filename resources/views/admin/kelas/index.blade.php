
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kelas | TechClass</title>

    <link rel="icon" href="{{ asset('admin/assets/favicon-9EIT7vLh.ico') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/main-BV-wpnXD.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/main-DVYj-QCH.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/charts-layout-C732DjRu.css') }}">

    <script type="module" src="{{ asset('admin/assets/main-ZZRh_wak.js') }}"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #f4f7fc;
            color: #1e293b;
            font-family: Arial, sans-serif;
        }

        .page-container {
            max-width: 1450px;
            margin: 0 auto;
            padding: 35px 25px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 27px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .page-header p {
            font-size: 14px;
            color: #64748b;
            margin: 0;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 19px;
            background: #2563eb;
            color: #ffffff;
            border: 1px solid #2563eb;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: #1d4ed8;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .alert-success {
            padding: 14px 17px;
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .table-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
            overflow: hidden;
        }

        .table-card-header {
            padding: 23px 25px;
            border-bottom: 1px solid #edf0f5;
        }

        .table-card-header h2 {
            font-size: 17px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 6px;
        }

        .table-card-header p {
            font-size: 12px;
            color: #94a3b8;
            margin: 0;
        }

        .table-content {
            padding: 22px 25px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .class-table {
            width: 100%;
            min-width: 950px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .class-table thead th {
            padding: 15px 13px;
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .class-table tbody td {
            padding: 15px 13px;
            font-size: 12px;
            color: #475569;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .class-table tbody tr:last-child td {
            border-bottom: none;
        }

        .class-table tbody tr:hover {
            background: #f8fbff;
        }

        .class-image {
            width: 75px;
            height: 55px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .no-image {
            width: 75px;
            height: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f1f5f9;
            color: #94a3b8;
            border-radius: 8px;
            font-size: 10px;
            text-align: center;
        }

        .class-title {
            color: #1e293b;
            font-weight: 600;
            min-width: 150px;
        }

        .category-text {
            color: #64748b;
        }

        .price-text {
            color: #1e293b;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-published {
            background: #dcfce7;
            color: #15803d;
        }

        .status-draft {
            background: #f1f5f9;
            color: #64748b;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .btn-edit,
        .btn-delete {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 62px;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-edit {
            color: #1d4ed8;
            background: #eff6ff;
            border: 1px solid #dbeafe;
        }

        .btn-edit:hover {
            background: #dbeafe;
            color: #1e40af;
        }

        .btn-delete {
            color: #dc2626;
            background: #fef2f2;
            border: 1px solid #fee2e2;
        }

        .btn-delete:hover {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty-state {
            padding: 45px 15px !important;
            text-align: center;
            color: #94a3b8 !important;
        }

        .empty-state i {
            display: block;
            font-size: 30px;
            margin-bottom: 12px;
            color: #cbd5e1;
        }

        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            padding-top: 20px;
            margin-top: 10px;
            border-top: 1px solid #edf0f5;
        }

        .pagination-info {
            color: #94a3b8;
            font-size: 12px;
        }

        .pagination-wrapper nav {
            margin-left: auto;
        }

        .pagination-wrapper nav p {
            margin-bottom: 0;
        }

        .pagination-wrapper nav svg {
            width: 18px;
            height: 18px;
        }

        .back-dashboard {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            margin-top: 23px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: #ffffff;
            color: #475569;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .back-dashboard:hover {
            background: #f1f5f9;
            color: #1e293b;
        }

        @media (max-width: 700px) {
            .page-container {
                padding: 23px 15px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 23px;
            }

            .table-card-header,
            .table-content {
                padding: 18px;
            }

            .pagination-wrapper {
                align-items: flex-start;
                flex-direction: column;
            }

            .pagination-wrapper nav {
                margin-left: 0;
                max-width: 100%;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="page-container">

    <!-- HEADER HALAMAN -->
    <div class="page-header">

        <div>
            <h1>Data Kelas</h1>
            <p>Kelola seluruh kelas pelatihan teknologi di TechClass.</p>
        </div>

        <a href="{{ route('admin.kelas.create') }}" class="btn-add">
            <i class="bi bi-plus-circle"></i>
            Tambah Kelas
        </a>

    </div>

    <!-- NOTIFIKASI -->
    @if (session('success'))
        <div class="alert-success">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- TABEL DATA KELAS -->
    <div class="table-card">

        <div class="table-card-header">
            <h2>Daftar Kelas Pelatihan</h2>
            <p>Informasi seluruh kelas yang terdaftar dalam sistem.</p>
        </div>

        <div class="table-content">

            <div class="table-responsive">

                <table class="class-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul Kelas</th>
                            <th>Kategori</th>
                            <th>Instruktur</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($kelas as $index => $item)

                            <tr>

                                <td>
                                    {{ $kelas->firstItem() + $index }}
                                </td>

                                <!-- GAMBAR -->
                                <td>
                                    @if ($item->gambar)

                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->judul_kelas }}"
                                            class="class-image"
                                        >

                                    @else

                                        <div class="no-image">
                                            Tidak ada gambar
                                        </div>

                                    @endif
                                </td>

                                <!-- JUDUL -->
                                <td>
                                    <div class="class-title">
                                        {{ $item->judul_kelas }}
                                    </div>
                                </td>

                                <!-- KATEGORI -->
                                <td>
                                    <span class="category-text">
                                        {{ $item->kategori->nama_kategori ?? '-' }}
                                    </span>
                                </td>

                                <!-- INSTRUKTUR -->
                                <td>
                                    {{ $item->instruktur }}
                                </td>

                                <!-- HARGA -->
                                <td>
                                    <span class="price-text">
                                        @if ($item->harga == 0)
                                            Gratis
                                        @else
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        @endif
                                    </span>
                                </td>

                                <!-- STATUS -->
                                <td>
                                    @if ($item->status == 'published')

                                        <span class="status-badge status-published">
                                            Published
                                        </span>

                                    @else

                                        <span class="status-badge status-draft">
                                            Draft
                                        </span>

                                    @endif
                                </td>

                                <!-- AKSI -->
                                <td>
                                    <div class="action-buttons">

                                        <a
                                            href="{{ route('admin.kelas.edit', $item->id_kelas) }}"
                                            class="btn-edit"
                                        >
                                            <i class="bi bi-pencil-square me-1"></i>
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.kelas.destroy', $item->id_kelas) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kelas ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete">
                                                <i class="bi bi-trash me-1"></i>
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    Belum ada data kelas.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- PAGINATION -->
            <div class="pagination-wrapper">

                <div class="pagination-info">
                    @if ($kelas->total() > 0)
                        Menampilkan {{ $kelas->firstItem() }}
                        sampai {{ $kelas->lastItem() }}
                        dari {{ $kelas->total() }} kelas.
                    @else
                        Belum ada data kelas.
                    @endif
                </div>

                <div>
                    {{ $kelas->links() }}
                </div>

            </div>

        </div>

    </div>

    <!-- KEMBALI KE DASHBOARD -->
    <a href="{{ route('admin.dashboard') }}" class="back-dashboard">
        <i class="bi bi-arrow-left"></i>
        Kembali ke Dashboard
    </a>

</div>

</body>
</html>
