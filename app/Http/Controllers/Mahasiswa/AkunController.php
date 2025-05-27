<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    // Tampilkan semua akun mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        return view('mahasiswa.akun.index', compact('mahasiswa'));
    }


    // Tampilkan detail akun
    public function show($id)
    {
        $akun = Akun::findOrFail($id);
        return view('mahasiswa.akun.show', compact('akun'));
    }

    // Tampilkan form edit akun
    public function edit()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        $prodis = \App\Models\Prodi::all();
        $jurusans = \App\Models\Jurusan::all();
        return view('mahasiswa.akun.edit', compact('mahasiswa', 'prodis', 'jurusans'));
    }

    // Update data akun
    public function update(Request $request)
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $mahasiswa->update($request->only(['nim', 'nama', 'email', 'prodi_id', 'jurusan_id']));

        return redirect()->route('mahasiswa.akun.index')->with('success', 'Data berhasil diperbarui.');
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
