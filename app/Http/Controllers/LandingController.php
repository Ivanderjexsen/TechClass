<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

class LandingController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('kategori')
            ->where('status', 'published')
            ->latest()
            ->paginate(6);

        return view('landing', compact('kelas'));
    }
}