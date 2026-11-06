
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pendaftar | TechClass</title>

    <link rel="icon" href="{{ asset('admin/assets/favicon-9EIT7vLh.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/main-BV-wpnXD.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/main-DVYj-QCH.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/charts-layout-C732DjRu.css') }}">

    <script type="module" src="{{ asset('admin/assets/main-ZZRh_wak.js') }}"></script>

    <style>
        body {
            background: #f5f7fb;
            color: #263445;
        }

        .page-wrapper {
            max-width: 1400px;
            margin: auto;
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
            margin-bottom: 7px;
        }

        .page-header p {
            color: #7b8794;
            margin: 0;
        }

        .back-button {
            background: #e9eef5;
            color: #475569;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .back-button:hover {
            background: #dce4ee;
            color: #334155;
        }

        .content-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(30, 50, 80, .04);
        }

        .card-heading {
            margin-bottom: 22px;
        }

        .card-heading h5 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-heading p {
            font-size: 13px;
            color: #8994a3;
            margin: 0;
        }

        .filter-form .form-control,
        .filter-form .form-select {
            border: 1px solid #dce3ec;
            border-radius: 8px;
            padding: 11px 13px;
            font-size: 13px;
        }

        .filter-form .form-control:focus,
        .filter-form .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }

        .btn-search {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 13px;
            font-weight: 600;
            width: 100%;
        }

        .btn-search:hover {
            background: #1d4ed8;
            color: #fff;
        }

        .btn-reset {
            display: block;
            text-align: center;
            background: #edf1f6;
            color: #475569;
            border-radius: 8px;
            padding: 10px 15px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-reset:hover {
            background: #dce4ee;
            color: #334155;
        }

        .btn-export {
            display: block;
            text-align: center;
            background: #16834b;
            color: #fff;
            border-radius: 8px;
            padding: 10px 12px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .btn-export:hover {
            background: #116b3c;
            color: #fff;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f7f9fc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .4px;
            padding: 15px 12px;
            border-bottom: 1px solid #e8edf4;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px 12px;
            vertical-align: middle;
            color: #475569;
            font-size: 13px;
        }

        .participant-name {
            font-weight: 600;
            color: #263445;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-pending {
            background: #fff7e6;
            color: #b7791f;
        }

        .status-accepted {
            background: #e8f8ef;
            color: #16834b;
        }

        .status-rejected {
            background: #fef0f0;
            color: #dc2626;
        }

        .action-buttons {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .btn-detail,
        .btn-delete {
            border: none;
            border-radius: 7px;
            padding: 7px 11px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-detail {
            background: #eff6ff;
            color: #2563eb;
        }

        .btn-detail:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty-state {
            text-align: center;
            padding: 45px 15px !important;
            color: #94a3b8 !important;
        }

        .table-info-text {
            color: #8994a3;
            font-size: 13px;
        }

        .alert {
            border-radius: 9px;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                padding: 25px 15px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .content-card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <div class="page-header">
        <div>
            <h1>Data Pendaftar</h1>
            <p>Kelola dan pantau peserta yang mendaftar kelas pelatihan TechClass.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="back-button">
            ← Kembali ke Dashboard
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="content-card">

        <div class="card-heading">
            <h5>Daftar Pendaftar</h5>
            <p>Informasi peserta yang telah mendaftarkan diri pada kelas pelatihan.</p>
        </div>

        <form
            action="{{ route('admin.pendaftar.index') }}"
            method="GET"
            class="row g-2 mb-4 filter-form">

            <div class="col-lg-4 col-md-4">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari nama, email, atau nomor telepon..."
                    value="{{ request('search') }}"
                >
            </div>

            <div class="col-lg-2 col-md-2">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>

                    <option value="pending"
                        {{ request('status') === 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="accepted"
                        {{ request('status') === 'accepted' ? 'selected' : '' }}>
                        Accepted
                    </option>

                    <option value="rejected"
                        {{ request('status') === 'rejected' ? 'selected' : '' }}>
                        Rejected
                    </option>
                </select>
            </div>

            <div class="col-lg-2 col-md-2">
                <button type="submit" class="btn-search">
                    Cari Data
                </button>
            </div>

            <div class="col-lg-2 col-md-2">
                <a href="{{ route('admin.pendaftar.index') }}" class="btn-reset">
                    Reset
                </a>
            </div>

            <div class="col-lg-2 col-md-2">
                <a
                    href="{{ route('admin.pendaftar.export', request()->only(['search', 'status'])) }}"
                    class="btn-export">
                    ↓ Ekspor Excel
                </a>
            </div>

        </form>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($pendaftar as $item)

                        <tr>
                            <td>
                                {{ $pendaftar->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <span class="participant-name">
                                    {{ $item->nama_pendaftar }}
                                </span>
                            </td>

                            <td>{{ $item->email }}</td>

                            <td>{{ $item->nomor_telepon }}</td>

                            <td>{{ $item->kelas->judul_kelas ?? '-' }}</td>

                            <td>
                                @if ($item->status_pendaftaran->value === 'accepted')
                                    <span class="status-badge status-accepted">
                                        Accepted
                                    </span>
                                @elseif ($item->status_pendaftaran->value === 'rejected')
                                    <span class="status-badge status-rejected">
                                        Rejected
                                    </span>
                                @else
                                    <span class="status-badge status-pending">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="action-buttons">

                                    <a
                                        href="{{ route('admin.pendaftar.show', $item->id_pendaftaran) }}"
                                        class="btn-detail">
                                        Detail
                                    </a>

                                    <form
                                        action="{{ route('admin.pendaftar.destroy', $item->id_pendaftaran) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftar ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="empty-state">
                                Data pendaftar tidak ditemukan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap mt-4 gap-2">

            <div class="table-info-text">
                @if ($pendaftar->total() > 0)
                    Menampilkan {{ $pendaftar->firstItem() }}
                    sampai {{ $pendaftar->lastItem() }}
                    dari {{ $pendaftar->total() }} data.
                @else
                    Tidak ada data untuk ditampilkan.
                @endif
            </div>

            <div>
                {{ $pendaftar->links() }}
            </div>

        </div>

    </div>

</div>

</body>
</html>
