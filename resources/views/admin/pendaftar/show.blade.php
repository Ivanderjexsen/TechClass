
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pendaftar | TechClass</title>

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
            max-width: 1000px;
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
            margin-bottom: 27px;
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

        .content-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 22px;
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

        .info-table {
            margin-bottom: 0;
        }

        .info-table th {
            width: 32%;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            padding: 15px 12px;
            background: #f8fafc;
        }

        .info-table td {
            color: #334155;
            font-size: 14px;
            padding: 15px 12px;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
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

        .form-label {
            color: #334155;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 9px;
        }

        .form-select {
            border: 1px solid #dce3ec;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 14px;
        }

        .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }

        .btn-save {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 11px 18px;
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
            padding: 11px 18px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-cancel:hover {
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

            .content-card {
                padding: 20px 16px;
            }

            .info-table th {
                width: 40%;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">

    <a href="{{ route('admin.pendaftar.index') }}" class="back-link">
        ← Kembali ke Data Pendaftar
    </a>

    <div class="page-header">
        <h1>Detail Pendaftar</h1>
        <p>Informasi lengkap peserta pendaftaran kelas TechClass.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-card">

        <div class="card-heading">
            <h5>Informasi Peserta</h5>
            <p>Data peserta yang telah melakukan pendaftaran.</p>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered info-table">

                <tr>
                    <th>Nama Pendaftar</th>
                    <td>{{ $pendaftar->nama_pendaftar }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $pendaftar->email }}</td>
                </tr>

                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $pendaftar->nomor_telepon }}</td>
                </tr>

                <tr>
                    <th>Kelas yang Dipilih</th>
                    <td>{{ $pendaftar->kelas->judul_kelas ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Kategori Kelas</th>
                    <td>{{ $pendaftar->kelas->kategori->nama_kategori ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Status Pendaftaran</th>
                    <td>
                        @if ($pendaftar->status_pendaftaran->value === 'accepted')
                            <span class="status-badge status-accepted">
                                Accepted
                            </span>
                        @elseif ($pendaftar->status_pendaftaran->value === 'rejected')
                            <span class="status-badge status-rejected">
                                Rejected
                            </span>
                        @else
                            <span class="status-badge status-pending">
                                Pending
                            </span>
                        @endif
                    </td>
                </tr>

            </table>
        </div>

    </div>

    <div class="content-card">

        <div class="card-heading">
            <h5>Ubah Status Pendaftaran</h5>
            <p>Tentukan status pendaftaran peserta berdasarkan hasil pemeriksaan admin.</p>
        </div>

        <form
            action="{{ route('admin.pendaftar.updateStatus', $pendaftar->id_pendaftaran) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label">Status Pendaftaran</label>

                <select name="status_pendaftaran" class="form-select" required>

                    <option value="pending"
                        {{ old('status_pendaftaran', $pendaftar->status_pendaftaran->value) === 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="accepted"
                        {{ old('status_pendaftaran', $pendaftar->status_pendaftaran->value) === 'accepted' ? 'selected' : '' }}>
                        Accepted
                    </option>

                    <option value="rejected"
                        {{ old('status_pendaftaran', $pendaftar->status_pendaftaran->value) === 'rejected' ? 'selected' : '' }}>
                        Rejected
                    </option>

                </select>

                @error('status_pendaftaran')
                    <small class="text-danger d-block mt-2">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="d-flex flex-wrap gap-2">

                <button type="submit" class="btn-save">
                    Simpan Status
                </button>

                <a href="{{ route('admin.pendaftar.index') }}" class="btn-cancel">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
