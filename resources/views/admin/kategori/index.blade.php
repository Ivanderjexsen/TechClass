
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori | TechClass</title>

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
            max-width: 1250px;
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

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
            border-radius: 9px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #1d4ed8;
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

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f7f9fc;
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .4px;
            padding: 15px;
            border-bottom: 1px solid #e8edf4;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px 15px;
            vertical-align: middle;
            color: #475569;
            font-size: 14px;
        }

        .category-name {
            font-weight: 600;
            color: #263445;
        }

        .count-badge {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-edit, .btn-delete {
            border: none;
            border-radius: 7px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-edit {
            background: #fff7e6;
            color: #d97706;
        }

        .btn-edit:hover {
            background: #ffedd5;
            color: #b45309;
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

        .back-button {
            display: inline-block;
            margin-top: 22px;
            padding: 10px 17px;
            background: #e9eef5;
            color: #475569;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .back-button:hover {
            background: #dce4ee;
            color: #334155;
        }

        .alert {
            border-radius: 9px;
        }

        @media (max-width: 600px) {
            .page-wrapper {
                padding: 25px 15px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .content-card {
                padding: 16px;
            }
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <div class="page-header">
        <div>
            <h1>Data Kategori</h1>
            <p>Kelola kategori kelas pelatihan teknologi.</p>
        </div>

        <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
            + Tambah Kategori
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
            <h5>Daftar Kategori Kelas</h5>
            <p>Informasi kategori yang tersedia pada sistem TechClass.</p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Kelas</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kategori as $index => $item)
                        <tr>
                            <td>{{ $kategori->firstItem() + $index }}</td>

                            <td>
                                <span class="category-name">
                                    {{ $item->nama_kategori }}
                                </span>
                            </td>

                            <td>
                                <span class="count-badge">
                                    {{ $item->kelas_count }} Kelas
                                </span>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a
                                        href="{{ route('admin.kategori.edit', $item->id_kategori) }}"
                                        class="btn-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.kategori.destroy', $item->id_kategori) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

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
                            <td colspan="4" class="empty-state">
                                Belum ada kategori yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $kategori->links() }}
        </div>

    </div>

    <a href="{{ route('admin.dashboard') }}" class="back-button">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>
