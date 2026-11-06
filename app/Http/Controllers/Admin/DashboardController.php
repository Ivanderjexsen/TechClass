<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_kelas' => DB::table('kelas')->count(),
            'kelas_published' => DB::table('kelas')
                ->where('status', 'published')
                ->count(),
            'total_pendaftar' => DB::table('pendaftaran')->count(),
            'pendaftaran_pending' => DB::table('pendaftaran')
                ->where('status_pendaftaran', 'pending')
                ->count(),
        ];

        $pendaftarTerbaru = DB::table('pendaftaran')
            ->join('kelas', 'pendaftaran.id_kelas', '=', 'kelas.id_kelas')
            ->select(
                'pendaftaran.id_pendaftaran',
                'pendaftaran.nama_pendaftar',
                'pendaftaran.email',
                'pendaftaran.status_pendaftaran',
                'kelas.judul_kelas'
            )
            ->orderByDesc('pendaftaran.id_pendaftaran')
            ->limit(5)
            ->get();

        $kelasPopuler = DB::table('kelas')
            ->leftJoin(
                'pendaftaran',
                'kelas.id_kelas',
                '=',
                'pendaftaran.id_kelas'
            )
            ->select(
                'kelas.id_kelas',
                'kelas.judul_kelas',
                'kelas.instruktur',
                'kelas.status'
            )
            ->selectRaw('COUNT(pendaftaran.id_pendaftaran) AS total_pendaftar')
            ->groupBy(
                'kelas.id_kelas',
                'kelas.judul_kelas',
                'kelas.instruktur',
                'kelas.status'
            )
            ->orderByDesc('total_pendaftar')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'pendaftarTerbaru',
            'kelasPopuler'
        ));
    }
}
