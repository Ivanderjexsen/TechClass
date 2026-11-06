<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Pemrograman',
            'Desain Grafis',
            'Jaringan Komputer',
            'Data dan AI',
        ];

        foreach ($kategori as $nama) {
            Kategori::create([
                'nama_kategori' => $nama,
            ]);
        }
    }
}