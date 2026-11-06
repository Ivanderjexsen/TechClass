<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        Kelas::create([
            'id_kategori' => 1,
            'judul_kelas' => 'Dasar Pemrograman Web',
            'deskripsi' => 'Belajar dasar HTML, CSS, dan JavaScript untuk membangun website.',
            'instruktur' => 'Budi Santoso',
            'harga' => 0,
            'status' => 'published',
        ]);

        Kelas::create([
            'id_kategori' => 2,
            'judul_kelas' => 'Desain Grafis untuk Pemula',
            'deskripsi' => 'Mempelajari dasar desain grafis menggunakan aplikasi desain.',
            'instruktur' => 'Andi Saputra',
            'harga' => 150000,
            'status' => 'published',
        ]);

        Kelas::create([
            'id_kategori' => 3,
            'judul_kelas' => 'Dasar Jaringan Komputer',
            'deskripsi' => 'Mempelajari konsep dasar jaringan komputer dan konfigurasi jaringan.',
            'instruktur' => 'Rizky Pratama',
            'harga' => 200000,
            'status' => 'draft',
        ]);
    }
}