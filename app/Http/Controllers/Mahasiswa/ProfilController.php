<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa; // Import model Mahasiswa
use Illuminate\Support\Facades\Auth; // Import Auth facade

class ProfilController extends Controller
{
    /**
     * Tampilkan halaman profil mahasiswa.
     */
    public function index()
    {
        // Ambil ID dari user yang sedang login
        $userId = Auth::id();

        // Cari data mahasiswa berdasarkan user_id, dan muat relasi 'prodi'
        $mahasiswa = Mahasiswa::where('user_id', $userId)->with('prodi')->first();

        // Jika data mahasiswa tidak ditemukan untuk user yang login, arahkan kembali dengan pesan error
        if (!$mahasiswa) {
            // Ini bisa terjadi jika ada user login tetapi belum ada entri di tabel 'mahasiswas'
            return redirect()->back()->with('error', 'Data profil mahasiswa tidak ditemukan. Silakan hubungi admin.');
        }

        // Kirim data mahasiswa ke view profil index
        return view('mahasiswa.profil.index', compact('mahasiswa'));
    }

    /**
     * Tampilkan formulir untuk mengedit profil.
     */
    public function edit()
    {
        $userId = Auth::id();
        $mahasiswa = Mahasiswa::where('user_id', $userId)->with('prodi')->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data profil mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.profil.edit', compact('mahasiswa'));
    }

    /**
     * Simpan perubahan profil mahasiswa.
     */
    public function update(Request $request)
    {
        $userId = Auth::id();
        $mahasiswa = Mahasiswa::where('user_id', $userId)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Data profil mahasiswa tidak ditemukan.');
        }

        // Lakukan validasi data input
        $request->validate([
            'nama' => 'required|string|max:255', // Sesuaikan dengan kolom nama di model Mahasiswa Anda
            'email' => 'required|email|max:255|unique:mahasiswas,email,' . $mahasiswa->id, // Asumsi 'mahasiswas' adalah nama tabel
            // Tambahkan validasi untuk kolom lain jika Anda ingin mengizinkan perubahan
            // 'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $mahasiswa->id,
            // 'alamat' => 'nullable|string|max:255',
            // 'telepon' => 'nullable|string|max:15',
        ]);

        // Perbarui data mahasiswa
        $mahasiswa->nama = $request->nama; // Sesuaikan dengan kolom nama di model Mahasiswa Anda
        $mahasiswa->email = $request->email; // Sesuaikan dengan kolom email di model Mahasiswa Anda
        // $mahasiswa->nim = $request->nim;
        // $mahasiswa->alamat = $request->alamat;
        // $mahasiswa->telepon = $request->telepon;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }
}