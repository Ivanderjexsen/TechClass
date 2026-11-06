<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Enums\StatusPendaftaran;
use App\Exports\PendaftarExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarController extends Controller
{
    /**
     * Menampilkan daftar pendaftar.
     */
    public function index(Request $request)
    {
        $query = Pendaftaran::with('kelas')
            ->latest('id_pendaftaran');

        // Filter berdasarkan status pendaftaran
        if ($request->filled('status')) {
            $query->where(
                'status_pendaftaran',
                $request->status
            );
        }

        // Pencarian berdasarkan nama, email, atau nomor telepon
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_pendaftar', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nomor_telepon', 'like', "%{$search}%");
            });
        }

        $pendaftar = $query->paginate(10)->withQueryString();

        return view('admin.pendaftar.index', compact('pendaftar'));
    }

    /**
     * Menampilkan detail pendaftar.
     */
    public function show($id)
    {
        $pendaftar = Pendaftaran::with('kelas.kategori')
            ->findOrFail($id);

        return view('admin.pendaftar.show', compact('pendaftar'));
    }

    /**
     * Memperbarui status pendaftaran.
     */
    public function updateStatus(Request $request, $id)
    {
        // Validasi status yang dikirim
        $data = $request->validate([
            'status_pendaftaran' => [
                'required',
                'in:pending,accepted,rejected',
            ],
        ]);

        // Cari data pendaftar
        $pendaftar = Pendaftaran::findOrFail($id);

        // Ubah status menggunakan Enum
        $pendaftar->status_pendaftaran = StatusPendaftaran::from(
            $data['status_pendaftaran']
        );

        // Simpan perubahan
        $pendaftar->save();

        return redirect()
            ->route('admin.pendaftar.show', $pendaftar->id_pendaftaran)
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Mengekspor data pendaftar ke Excel.
     */
    public function export(Request $request)
    {
        $namaFile = 'data-pendaftar-' . now()->format('Y-m-d-His') . '.xlsx';

        return Excel::download(
            new PendaftarExport(
                $request->input('search'),
                $request->input('status')
            ),
            $namaFile
        );
    }

    /**
     * Menghapus data pendaftar.
     */
    public function destroy($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);

        $pendaftar->delete();

        return redirect()
            ->route('admin.pendaftar.index')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
