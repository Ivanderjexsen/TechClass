<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('kategori')
            ->latest('id_kelas')
            ->paginate(10);

        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('admin.kelas.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_kategori' => ['required', 'exists:kategori,id_kategori'],
            'judul_kelas' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'instruktur' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('kelas', 'public');
        }

        $kelas = new Kelas();
        $kelas->id_kategori = $data['id_kategori'];
        $kelas->judul_kelas = $data['judul_kelas'];
        $kelas->deskripsi = $data['deskripsi'];
        $kelas->instruktur = $data['instruktur'];
        $kelas->harga = $data['harga'];
        $kelas->gambar = $data['gambar'] ?? null;
        $kelas->status = $data['status'];
        $kelas->save();

        return redirect()
            ->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('admin.kelas.edit', compact('kelas', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $data = $request->validate([
            'id_kategori' => ['required', 'exists:kategori,id_kategori'],
            'judul_kelas' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'instruktur' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
            'gambar' => ['nullable', 'image', 'max:2048'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($kelas->gambar) {
                Storage::disk('public')->delete($kelas->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('kelas', 'public');
        }

        $kelas->id_kategori = $data['id_kategori'];
        $kelas->judul_kelas = $data['judul_kelas'];
        $kelas->deskripsi = $data['deskripsi'];
        $kelas->instruktur = $data['instruktur'];
        $kelas->harga = $data['harga'];
        $kelas->status = $data['status'];

        if (isset($data['gambar'])) {
            $kelas->gambar = $data['gambar'];
        }

        $kelas->save();

        return redirect()
            ->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);

        if ($kelas->gambar) {
            Storage::disk('public')->delete($kelas->gambar);
        }

        $kelas->delete();

        return redirect()
            ->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}
