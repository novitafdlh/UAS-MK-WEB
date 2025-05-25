<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Mahasiswa; // Pastikan model Mahasiswa sudah ada
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    // Tampilkan semua akun mahasiswa (untuk dosen memilih mahasiswa)
    public function index()
    {
        $akuns = Akun::with('user')->get();
        return view('mahasiswa.akun.index', compact('akuns'));
    }

    // Tampilkan form tambah akun
    public function create()
    {
        return view('mahasiswa.akun.create');
    }

    // Simpan akun baru, otomatis simpan user_id mahasiswa yang login
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:akuns,nim',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:akuns,email',
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $validatedData['user_id'] = Auth::id();

        // Simpan ke tabel akuns
        $akun = Akun::create($validatedData);

        // Simpan ke tabel mahasiswas (untuk admin)
        Mahasiswa::create($validatedData);

        return redirect()->route('mahasiswa.akun.index')->with('success', 'Akun berhasil dibuat.');
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
        $mahasiswa = Mahasiswa::where('user_id', $akun->user_id)->first();
        if ($mahasiswa) {
            $mahasiswa->update([
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
        $mahasiswa = Mahasiswa::where('user_id', $akun->user_id)->first();
        if ($mahasiswa) {
            $mahasiswa->delete();
        }

        $akun->delete();

        return redirect()->route('mahasiswa.akun.index')->with('success', 'Akun berhasil dihapus.');
    }
}
