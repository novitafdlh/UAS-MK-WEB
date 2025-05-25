<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class ProfilController extends Controller
{
    /**
     * Tampilkan halaman profil mahasiswa.
     */
    public function index()
    {
        // Ambil user ID dari login (ganti sesuai kebutuhan)
        $userId = auth()->id();

        // Cari data mahasiswa berdasarkan user_id
        $mahasiswa = Mahasiswa::where('user_id', $userId)->with('prodi')->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.profil.index', compact('mahasiswa'));
    }

    /**
     * Tampilkan form edit profil.
     */
    public function edit()
    {
        $userId = auth()->id();

        $mahasiswa = Mahasiswa::where('user_id', $userId)->with('prodi')->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.profil.edit', compact('mahasiswa'));
    }

    /**
     * Simpan perubahan profil mahasiswa.
     */
    public function update(Request $request)
    {
        $userId = auth()->id();

        $mahasiswa = Mahasiswa::where('user_id', $userId)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Update data mahasiswa
        $mahasiswa->name = $request->name;
        $mahasiswa->email = $request->email;
        // Update field lain sesuai kebutuhan
        $mahasiswa->save();

        return redirect()->route('mahasiswa.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
