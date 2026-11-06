<?php

namespace App\Models;

use App\Enums\StatusKelas;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'id_kategori',
        'judul_kelas',
        'deskripsi',
        'instruktur',
        'harga',
        'gambar',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => StatusKelas::class,
        ];
    }

    public function kategori()
    {
        return $this->belongsTo(
            Kategori::class,
            'id_kategori',
            'id_kategori'
        );
    }

    public function pendaftaran()
    {
        return $this->hasMany(
            Pendaftaran::class,
            'id_kelas',
            'id_kelas'
        );
    }
}