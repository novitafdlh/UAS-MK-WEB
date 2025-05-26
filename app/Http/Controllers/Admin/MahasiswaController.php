<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Eager load relasi 'prodi' dan 'jurusan' (melalui prodi)
        $mahasiswa = Mahasiswa::with('prodi.jurusan')->get();
        return view('admin.mahasiswa.data.index', compact('mahasiswa'));
    }

    public function create()
    {
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.mahasiswa.data.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email',
            'user_id' => 'nullable|exists:users,id',
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        Mahasiswa::create($validatedData);

        return redirect()->route('admin.mahasiswa.data.index')->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::with('prodi.jurusan')->findOrFail($id); // Eager load juga di edit
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.mahasiswa.data.edit', compact('mahasiswa', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $mahasiswa->update($validatedData);

        return redirect()->route('admin.mahasiswa.data.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.data.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}