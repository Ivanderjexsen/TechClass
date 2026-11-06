# TechClass — Platform Pendaftaran Kelas Pelatihan Teknologi

TechClass adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk menyediakan informasi kelas pelatihan teknologi dan mempermudah proses pendaftaran peserta. Aplikasi ini dilengkapi dengan halaman publik dan dashboard administrator untuk mengelola data kelas, kategori, serta pendaftaran peserta.

---

## 1. Tentang Project

**Nama Project:** TechClass  
**Jenis Aplikasi:** Web Application  
**Kategori:** Sistem Informasi Pendaftaran Kelas Pelatihan  
**Framework:** Laravel 13  
**Bahasa:** PHP, HTML, CSS  
**Database:** MySQL (sesuaikan dengan konfigurasi database pada `.env`)  
**UI Admin:** Kiaalap Admin Template  
**Export Data:** Excel menggunakan Laravel Excel

### Latar Belakang

Perkembangan teknologi digital meningkatkan kebutuhan masyarakat terhadap keterampilan di bidang teknologi informasi. Pelatihan menjadi salah satu cara untuk mengembangkan kemampuan tersebut.

Namun, informasi kelas dan proses pendaftaran yang belum terorganisasi dengan baik dapat menyulitkan calon peserta maupun pengelola pelatihan.

TechClass dikembangkan sebagai platform yang membantu calon peserta menemukan kelas pelatihan teknologi dan melakukan pendaftaran secara online. Administrator juga dapat mengelola informasi kelas dan data pendaftar melalui dashboard.

### Tujuan Project

1. Menyediakan informasi kelas pelatihan teknologi secara online.
2. Mempermudah calon peserta melakukan pendaftaran kelas.
3. Mempermudah administrator mengelola data kelas dan kategori.
4. Mengelola informasi dan status pendaftaran peserta.
5. Menyediakan laporan dan ekspor data pendaftar dalam format Excel.

---

## 2. Fitur Aplikasi

### A. Halaman Publik

- Menampilkan halaman utama TechClass.
- Menampilkan informasi dan daftar kelas yang tersedia.
- Menampilkan gambar, kategori, deskripsi, instruktur, dan harga kelas.
- Menyediakan halaman detail kelas.
- Menyediakan formulir pendaftaran kelas.
- Menampilkan navigasi menuju halaman login administrator.
- Menampilkan daftar kelas dengan pagination.

### B. Autentikasi Administrator

- Login administrator.
- Logout administrator.
- Pengelolaan sesi login menggunakan session Laravel.
- Pembatasan akses halaman administrator berdasarkan status login.

### C. Dashboard Administrator

- Menampilkan ringkasan jumlah kelas.
- Menampilkan jumlah kelas yang telah dipublikasikan.
- Menampilkan jumlah pendaftar.
- Menampilkan jumlah pendaftaran berdasarkan status.
- Menampilkan data pendaftar terbaru.
- Menampilkan kelas dengan jumlah pendaftar terbanyak.
- Menampilkan grafik pendaftaran selama tujuh hari terakhir.

### D. Manajemen Data Kelas

Administrator dapat:

- Melihat daftar kelas.
- Menambahkan kelas baru.
- Mengubah informasi kelas.
- Mengunggah gambar kelas.
- Mengatur harga dan instruktur.
- Mengatur status kelas.
- Menghapus data kelas.

Status kelas:
- `draft` — Kelas belum dipublikasikan.
- `published` — Kelas telah dipublikasikan dan dapat ditampilkan kepada pengunjung.

### E. Manajemen Kategori

Administrator dapat:

- Melihat daftar kategori.
- Menambahkan kategori.
- Mengubah kategori.
- Menghapus kategori.

Kategori yang masih digunakan oleh kelas tidak dapat dihapus.

### F. Manajemen Data Pendaftar

Administrator dapat:

- Melihat daftar peserta yang mendaftar.
- Melihat detail pendaftaran.
- Mengubah status pendaftaran.
- Menghapus data pendaftaran.
- Mencari data pendaftar.
- Memfilter pendaftar berdasarkan status.
- Mengekspor data pendaftar ke Excel.

Status pendaftaran:
- `pending` — Pendaftaran menunggu proses pemeriksaan.
- `accepted` — Pendaftaran diterima.
- `rejected` — Pendaftaran ditolak.

### G. Ekspor Data

Aplikasi menyediakan fitur ekspor data pendaftar ke format `.xlsx`.

Informasi yang disertakan:

- Nomor
- Nama pendaftar
- Email
- Nomor telepon
- Nama kelas
- Kategori
- Status pendaftaran
- Tanggal pendaftaran

Ekspor dapat mengikuti filter pencarian dan status yang digunakan pada halaman data pendaftar.

---

## 3. Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| PHP 8.4 | Bahasa pemrograman backend |
| Laravel 13 | Framework aplikasi |
| MySQL | Penyimpanan data relasional |
| HTML5 | Struktur halaman web |
| CSS3 | Tampilan dan desain halaman |
| JavaScript | Interaksi pada halaman |
| Blade | Template engine Laravel |
| Kiaalap | Template dashboard administrator |
| Laravel Excel | Ekspor data ke Excel |

---

## 4. Struktur Database

TechClass menggunakan beberapa tabel utama berikut.

### A. Tabel `pengguna`

Menyimpan informasi akun administrator.

| Kolom | Keterangan |
|---|---|
| `id_pengguna` | Primary key |
| `nama` | Nama administrator |
| `email` | Email administrator |
| `kata_sandi` | Kata sandi administrator |

### B. Tabel `kategori`

Menyimpan kategori kelas pelatihan.

| Kolom | Keterangan |
|---|---|
| `id_kategori` | Primary key |
| `nama_kategori` | Nama kategori |

### C. Tabel `kelas`

Menyimpan informasi kelas pelatihan.

| Kolom | Keterangan |
|---|---|
| `id_kelas` | Primary key |
| `id_kategori` | Foreign key kategori |
| `judul_kelas` | Judul kelas |
| `deskripsi` | Deskripsi kelas |
| `instruktur` | Nama instruktur |
| `harga` | Harga kelas |
| `gambar` | Lokasi gambar kelas |
| `status` | Status publikasi kelas |

### D. Tabel `pendaftaran`

Menyimpan data peserta yang mendaftar kelas.

| Kolom | Keterangan |
|---|---|
| `id_pendaftaran` | Primary key |
| `id_kelas` | Foreign key kelas |
| `nama_pendaftar` | Nama peserta |
| `email` | Email peserta |
| `nomor_telepon` | Nomor telepon peserta |
| `status_pendaftaran` | Status pendaftaran |

**Relasi antartabel:**

- Kategori memiliki banyak kelas (`One to Many`).
- Kelas dimiliki oleh satu kategori (`Many to One`).
- Kelas memiliki banyak pendaftaran (`One to Many`).
- Pendaftaran terhubung dengan satu kelas (`Many to One`).
- Kombinasi `id_kelas` dan `email` pada pendaftaran bersifat unik untuk mencegah pendaftaran ganda dengan email yang sama pada kelas yang sama.

---

## 5. Persyaratan Sistem

Sebelum menjalankan project, pastikan perangkat telah memiliki:

- PHP 8.4 atau versi yang kompatibel dengan Laravel 13.
- Composer.
- MySQL atau database yang dikonfigurasi pada `.env`.
- Web server lokal seperti Laragon.
- Git (opsional, untuk pengelolaan versi project).

---

## 6. Instalasi Project

Ikuti langkah berikut untuk menjalankan TechClass di komputer lokal.

### Langkah 1 — Clone Repository

```bash
git clone URL_REPOSITORY
```

Masuk ke direktori project:

```bash
cd pendaftaran-kelas
```

### Langkah 2 — Install Dependency

```bash
composer install
```

### Langkah 3 — Konfigurasi Environment

Salin file `.env.example` menjadi `.env` jika file `.env` belum tersedia.

```bash
copy .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

### Langkah 4 — Konfigurasi Database

Buka file `.env`, kemudian sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pendaftaran_kelas
DB_USERNAME=root
DB_PASSWORD=
```

Buat database dengan nama yang sesuai melalui phpMyAdmin atau MySQL.

### Langkah 5 — Migrasi Database

Jalankan migrasi tabel:

```bash
php artisan migrate
```

Untuk mengisi data awal menggunakan seeder:

```bash
php artisan db:seed
```

Jika ingin menjalankan migrasi sekaligus mengisi data awal pada database baru:

```bash
php artisan migrate --seed
```

### Langkah 6 — Buat Storage Link

Agar gambar kelas dapat ditampilkan pada halaman publik:

```bash
php artisan storage:link
```

### Langkah 7 — Jalankan Aplikasi

```bash
php artisan serve
```

Buka alamat berikut pada browser:

```text
http://127.0.0.1:8000
```

---

## 7. Akun Administrator

Akun administrator awal yang digunakan pada proses pengembangan:

| Informasi | Nilai |
|---|---|
| Email | `admin@gmail.com` |
| Password | `admin123` |

**Catatan:** Kredensial tersebut merupakan akun awal pengembangan. Ganti kata sandi sebelum aplikasi digunakan pada lingkungan produksi.

---

## 8. Struktur Direktori Project

Berikut gambaran direktori utama aplikasi Laravel TechClass.

```text
pendaftaran-kelas/
│
├── app/
│   ├── Enums/
│   │   ├── StatusKelas.php
│   │   └── StatusPendaftaran.php
│   │
│   ├── Exports/
│   │   └── PendaftarExport.php
│   │
│   ├── Http/
│   │   └── Controllers/
│   │       └── Admin/
│   │
│   └── Models/
│       ├── Pengguna.php
│       ├── Kategori.php
│       ├── Kelas.php
│       └── Pendaftaran.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── admin/
│   │   └── assets/
│   ├── images/
│   └── storage/
│
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   ├── login.blade.php
│       │   ├── kelas/
│       │   ├── kategori/
│       │   └── pendaftar/
│       │
│       └── landing.blade.php
│
├── routes/
│   └── web.php
│
├── storage/
│   └── app/
│       └── public/
│           └── kelas/
│
├── .env.example
├── artisan
├── composer.json
└── README.md
```

Struktur di atas merupakan gambaran direktori utama dan bukan daftar seluruh file project.

---

## 9. Alur Penggunaan Aplikasi

### Pengunjung

1. Membuka halaman utama TechClass.
2. Melihat daftar kelas yang tersedia.
3. Memilih kelas yang diminati.
4. Membuka detail kelas.
5. Mengisi formulir pendaftaran.
6. Mengirimkan data pendaftaran.

### Administrator

1. Membuka halaman login.
2. Memasukkan email dan kata sandi.
3. Masuk ke dashboard administrator.
4. Mengelola kelas dan kategori.
5. Memeriksa data pendaftar.
6. Memperbarui status pendaftaran.
7. Mengekspor laporan pendaftar ke Excel.

---

## 10. Keamanan dan Validasi

Beberapa mekanisme yang digunakan dalam aplikasi:

- Pembatasan halaman administrator menggunakan pemeriksaan session.
- Validasi input pada proses pengelolaan data.
- Validasi data pendaftaran.
- Pencegahan pendaftaran ganda berdasarkan kelas dan email.
- Penggunaan CSRF protection bawaan Laravel pada form yang sesuai.
- Penyimpanan gambar kelas melalui mekanisme storage Laravel.

Untuk penggunaan produksi, perlu dilakukan pemeriksaan tambahan terhadap keamanan autentikasi, hak akses, konfigurasi server, dan kredensial administrator.

---

## 11. Pengembangan Selanjutnya

Beberapa pengembangan yang dapat dipertimbangkan:

- Pengiriman notifikasi pendaftaran melalui email.
- Halaman khusus peserta.
- Riwayat pendaftaran peserta.
- Sertifikat penyelesaian pelatihan.
- Integrasi pembayaran online.
- Pengembangan laporan dan statistik yang lebih lengkap.
- Penguatan keamanan dan manajemen hak akses.

---

## 12. Status Project

TechClass telah memiliki fitur utama untuk proses pendaftaran kelas dan pengelolaan data oleh administrator.

Fitur inti yang telah dikembangkan meliputi halaman publik, autentikasi administrator, dashboard, CRUD kelas, CRUD kategori, manajemen pendaftar, dan ekspor Excel.

---

## 13. Lisensi

Project ini dikembangkan sebagai aplikasi sistem informasi pendaftaran kelas pelatihan teknologi. Penggunaan dan distribusinya mengikuti ketentuan lisensi dari masing-masing framework, library, dan aset pihak ketiga yang digunakan.

---

**TechClass. — Learn. Practice. Grow.**

Platform pendaftaran kelas pelatihan teknologi untuk mendukung pengembangan keterampilan digital.
