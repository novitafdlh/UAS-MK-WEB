<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Mahasiswa; // Pastikan model Mahasiswa sudah ada
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    // Tampilkan semua akun mahasiswa
    public function index()
    {
        $userId = Auth::id();

        // Cari data mahasiswa berdasarkan user_id login
        $mahasiswas = Mahasiswa::where('user_id', $userId)->first();

        // Kalau mahasiswa ditemukan, ambil akun yang sesuai dengan mahasiswa tersebut
        if ($mahasiswas) {
            $akun = Akun::where('user_id', $userId)->with('user')->get();
        } else {
            // Jika mahasiswa tidak ada, tampilkan koleksi kosong
            $akun = collect();
    }

    return view('mahasiswa.akun.index', compact('akun'));
    }


    // Tampilkan detail akun
    public function show($id)
    {
        $akun = Akun::findOrFail($id);
        return view('mahasiswa.akun.show', compact('akun'));
    }

    // Tampilkan form edit akun
    public function edit($id)
    {
        $akun = Akun::findOrFail($id);
        return view('mahasiswa.akun.edit', compact('akun'));
    }

    // Update data akun
    public function update(Request $request, $id)
    {
        $akun = Akun::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:akuns,nim,' . $akun->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akuns,email,' . $akun->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $akun->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'prodi_id' => $request->prodi_id,
            'jurusan_id' => $request->jurusan_id,
        ]);

        // Update juga data mahasiswa (jika ada)
        $mahasiswas = Mahasiswa::where('user_id', $akun->user_id)->first();
        if ($mahasiswas) {
            $mahasiswas->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'email' => $request->email,
                'prodi_id' => $request->prodi_id,
                'jurusan_id' => $request->jurusan_id,
            ]);
        }

        return redirect()->route('mahasiswa.akun.index')->with('success', 'Akun berhasil diupdate.');
    }

    // Hapus akun
    public function destroy($id)
    {
        $akun = Akun::findOrFail($id);

        // Hapus juga data mahasiswa (jika ada)
        $mahasiswas = Mahasiswa::where('user_id', $akun->user_id)->first();
        if ($mahasiswas) {
            $mahasiswas->delete();
        }

        $akun->delete();

        return redirect()->route('mahasiswa.akun.index')->with('success', 'Akun berhasil dihapus.');
    }
}
