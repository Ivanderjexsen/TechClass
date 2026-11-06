
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kelas | TechClass</title>

    <link rel="icon" type="image/x-icon"
          href="{{ asset('admin/assets/favicon-9EIT7vLh.ico') }}">

    <link rel="stylesheet"
          href="{{ asset('admin/assets/main-BV-wpnXD.css') }}">

    <link rel="stylesheet"
          href="{{ asset('admin/assets/main-DVYj-QCH.css') }}">

    <link rel="stylesheet"
          href="{{ asset('admin/assets/charts-layout-C732DjRu.css') }}">

    <script type="module"
            src="{{ asset('admin/assets/main-ZZRh_wak.js') }}"></script>

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
            max-width: 1050px;
            margin: 0 auto;
            padding: 35px 25px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: #ffffff;
            color: #475569;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 22px;
            transition: 0.2s;
        }

        .back-button:hover {
            background: #eff6ff;
            color: #2563eb;
            border-color: #bfdbfe;
        }

        .page-heading h1 {
            font-size: 27px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: #64748b;
            font-size: 14px;
            margin: 0;
        }

        .form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.04);
            overflow: hidden;
        }

        .card-header-custom {
            padding: 23px 28px;
            border-bottom: 1px solid #edf0f5;
        }

        .card-header-custom h2 {
            font-size: 17px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 6px;
        }

        .card-header-custom p {
            font-size: 13px;
            color: #94a3b8;
            margin: 0;
        }

        .card-body-custom {
            padding: 28px;
        }

        .form-section-title {
            font-size: 14px;
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eff3f8;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 9px;
        }

        .required {
            color: #ef4444;
        }

        .form-control,
        .form-select {
            width: 100%;
            min-height: 45px;
            padding: 10px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #ffffff;
            color: #334155;
            font-size: 13px;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
        }

        textarea.form-control {
            min-height: 130px;
            resize: vertical;
            line-height: 1.6;
        }

        input[type="file"].form-control {
            padding: 9px;
        }

        .form-help {
            display: block;
            margin-top: 8px;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.5;
        }

        .error-message {
            display: block;
            margin-top: 7px;
            color: #dc2626;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 23px;
            margin-top: 10px;
            border-top: 1px solid #edf0f5;
        }

        .btn-save,
        .btn-cancel {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            min-height: 43px;
            padding: 10px 19px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-save {
            background: #2563eb;
            color: #ffffff;
            border: 1px solid #2563eb;
        }

        .btn-save:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-cancel {
            background: #ffffff;
            color: #64748b;
            border: 1px solid #cbd5e1;
        }

        .btn-cancel:hover {
            background: #f1f5f9;
            color: #334155;
        }

        @media (max-width: 600px) {
            .page-container {
                padding: 22px 15px;
            }

            .page-heading h1 {
                font-size: 23px;
            }

            .card-header-custom,
            .card-body-custom {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-save,
            .btn-cancel {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="page-container">

    <!-- HEADER HALAMAN -->
    <div class="page-heading">

        <a href="{{ route('admin.kelas.index') }}" class="back-button">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Data Kelas
        </a>

        <h1>Tambah Kelas</h1>

        <p>
            Tambahkan informasi kelas pelatihan baru ke dalam platform TechClass.
        </p>

    </div>

    <!-- FORM TAMBAH KELAS -->
    <div class="form-card">

        <div class="card-header-custom">
            <h2>Informasi Kelas</h2>
            <p>Lengkapi seluruh informasi kelas di bawah ini.</p>
        </div>

        <div class="card-body-custom">

            <form action="{{ route('admin.kelas.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <h3 class="form-section-title">
                    Detail Kelas
                </h3>

                <!-- JUDUL KELAS -->
                <div class="form-group">
                    <label for="judul_kelas">
                        Judul Kelas <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="judul_kelas"
                        name="judul_kelas"
                        class="form-control"
                        value="{{ old('judul_kelas') }}"
                        placeholder="Contoh: Belajar Web Development"
                        required
                    >

                    @error('judul_kelas')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- KATEGORI -->
                <div class="form-group">
                    <label for="id_kategori">
                        Kategori Kelas <span class="required">*</span>
                    </label>

                    <select
                        name="id_kategori"
                        id="id_kategori"
                        class="form-select"
                        required
                    >
                        <option value="">Pilih kategori kelas</option>

                        @foreach ($kategori as $item)
                            <option
                                value="{{ $item->id_kategori }}"
                                {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}
                            >
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>

                    @error('id_kategori')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- DESKRIPSI -->
                <div class="form-group">
                    <label for="deskripsi">
                        Deskripsi Kelas <span class="required">*</span>
                    </label>

                    <textarea
                        name="deskripsi"
                        id="deskripsi"
                        class="form-control"
                        rows="5"
                        placeholder="Jelaskan materi dan manfaat yang akan dipelajari..."
                        required
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- INSTRUKTUR -->
                <div class="form-group">
                    <label for="instruktur">
                        Nama Instruktur <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="instruktur"
                        name="instruktur"
                        class="form-control"
                        value="{{ old('instruktur') }}"
                        placeholder="Masukkan nama instruktur"
                        required
                    >

                    @error('instruktur')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <h3 class="form-section-title" style="margin-top: 30px;">
                    Pengaturan Kelas
                </h3>

                <!-- HARGA -->
                <div class="form-group">
                    <label for="harga">
                        Harga Kelas (Rp) <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        class="form-control"
                        min="0"
                        value="{{ old('harga', 0) }}"
                        placeholder="Contoh: 150000"
                        required
                    >

                    @error('harga')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- GAMBAR -->
                <div class="form-group">
                    <label for="gambar">
                        Gambar Kelas
                    </label>

                    <input
                        type="file"
                        id="gambar"
                        name="gambar"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <small class="form-help">
                        Format yang didukung: JPG, PNG, atau WebP.
                        Ukuran maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- STATUS -->
                <div class="form-group">
                    <label for="status">
                        Status Kelas <span class="required">*</span>
                    </label>

                    <select
                        name="status"
                        id="status"
                        class="form-select"
                        required
                    >
                        <option
                            value="draft"
                            {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="published"
                            {{ old('status') == 'published' ? 'selected' : '' }}
                        >
                            Published
                        </option>
                    </select>

                    <small class="form-help">
                        Draft: kelas belum ditampilkan kepada pengunjung.
                        Published: kelas ditampilkan pada halaman website.
                    </small>

                    @error('status')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- TOMBOL -->
                <div class="form-actions">

                    <button type="submit" class="btn-save">
                        <i class="bi bi-save"></i>
                        Simpan Kelas
                    </button>

                    <a href="{{ route('admin.kelas.index') }}"
                       class="btn-cancel">
                        Batal
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
