<?php

namespace App\Models;

use App\Enums\StatusPendaftaran;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = [
        'id_kelas',
        'nama_pendaftar',
        'email',
        'nomor_telepon',
        'status_pendaftaran',
    ];

    protected function casts(): array
    {
        return [
            'status_pendaftaran' => StatusPendaftaran::class,
        ];
    }

    public function kelas()
    {
        return $this->belongsTo(
            Kelas::class,
            'id_kelas',
            'id_kelas'
        );
    }
}