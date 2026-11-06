<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        Pengguna::create([
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'kata_sandi' => Hash::make('admin123'),
        ]);
    }
}