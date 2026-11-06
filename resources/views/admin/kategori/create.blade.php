
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori | TechClass</title>

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
            max-width: 850px;
            margin: auto;
            padding: 35px 25px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 22px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .page-header {
            margin-bottom: 25px;
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

        .form-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(30, 50, 80, .04);
        }

        .form-card h5 {
            font-weight: 700;
            font-size: 17px;
            margin-bottom: 7px;
        }

        .form-description {
            color: #8994a3;
            font-size: 13px;
            margin-bottom: 25px;
        }

        .form-label {
            color: #334155;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 9px;
        }

        .form-control {
            border: 1px solid #dce3ec;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }

        .form-help {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 8px;
        }

        .btn-save {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 11px 19px;
            font-weight: 600;
        }

        .btn-save:hover {
            background: #1d4ed8;
            color: #fff;
        }

        .btn-cancel {
            background: #edf1f6;
            color: #475569;
            border: none;
            border-radius: 8px;
            padding: 11px 19px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: #dce4ee;
            color: #334155;
        }

        @media (max-width: 600px) {
            .page-wrapper {
                padding: 25px 15px;
            }

            .form-card {
                padding: 22px 18px;
            }
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <a href="{{ route('admin.kategori.index') }}" class="back-link">
        ← Kembali ke Data Kategori
    </a>

    <div class="page-header">
        <h1>Tambah Kategori</h1>
        <p>Tambahkan kategori baru untuk mengelompokkan kelas pelatihan.</p>
    </div>

    <div class="form-card">

        <h5>Informasi Kategori</h5>
        <p class="form-description">
            Lengkapi nama kategori yang ingin ditambahkan.
        </p>

        <form action="{{ route('admin.kategori.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">Nama Kategori</label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ old('nama_kategori') }}"
                    placeholder="Contoh: Pemrograman Web"
                    required
                >

                @error('nama_kategori')
                    <small class="text-danger d-block mt-2">
                        {{ $message }}
                    </small>
                @enderror

                <div class="form-help">
                    Masukkan nama kategori yang mudah dipahami.
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn-save">
                    Simpan Kategori
                </button>

                <a href="{{ route('admin.kategori.index') }}" class="btn-cancel">
                    Batal
                </a>
            </div>
        </form>

    </div>

</div>

</body>
</html>
