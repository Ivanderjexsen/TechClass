<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'kata_sandi' => ['required', 'string'],
        ]);

        $pengguna = Pengguna::query()
            ->where('email', $credentials['email'])
            ->first();

        if (
            !$pengguna ||
            !Hash::check($credentials['kata_sandi'], $pengguna->kata_sandi)
        ) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi tidak sesuai.',
            ]);
        }

        $request->session()->regenerate();

        $request->session()->put([
            'admin_id' => $pengguna->id_pengguna,
            'admin_nama' => $pengguna->nama,
        ]);

        return redirect()->intended(route('admin.dashboard'));
    }

    public function destroy(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('success', 'Berhasil keluar dari akun.');
    }
}
