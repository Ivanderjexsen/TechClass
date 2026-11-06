<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PendaftaranController extends Controller
{
    public function detail($id)
    {
        $kelas = Kelas::where('id_kelas', $id)
            ->where('status', 'published')
            ->firstOrFail();

        return view('detail', compact('kelas'));
    }

    public function store(Request $request, $id)
    {
        $kelas = Kelas::where('id_kelas', $id)
            ->where('status', 'published')
            ->firstOrFail();

        $request->validate([
            'nama_pendaftar' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('pendaftaran', 'email')
                    ->where('id_kelas', $id),
            ],
            'nomor_telepon' => 'required|string|max:20',
        ], [
            'email.unique' => 'Email sudah terdaftar pada kelas ini.',
        ]);

        Pendaftaran::create([
            'id_kelas' => $kelas->id_kelas,
            'nama_pendaftar' => $request->nama_pendaftar,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'status_pendaftaran' => 'pending',
        ]);

        return redirect()
            ->route('kelas.detail', $id)
            ->with('success', 'Pendaftaran berhasil dikirim!');
    }
}