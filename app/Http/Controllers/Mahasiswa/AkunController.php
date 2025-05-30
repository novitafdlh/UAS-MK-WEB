<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    // Tampilkan profil mahasiswa
    public function index()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->where('id', Auth::id())->first();
        return view('mahasiswa.akun.index', compact('mahasiswa'));
    }

    // Tampilkan detail akun (opsional, jika memang ada view show)
    public function show($id)
    {
        $akun = User::where('role', 'mahasiswa')->findOrFail($id);
        return view('mahasiswa.akun.show', compact('akun'));
    }

    // Tampilkan form edit akun
    public function edit()
    {
        $mahasiswa = User::where('role', 'mahasiswa')->where('id', Auth::id())->first();
        $prodis = \App\Models\Prodi::all();
        $jurusans = \App\Models\Jurusan::all();
        return view('mahasiswa.akun.edit', compact('mahasiswa', 'prodis', 'jurusans'));
    }

    // Update data akun
    public function update(Request $request)
    {
        $mahasiswa = User::where('role', 'mahasiswa')->where('id', Auth::id())->firstOrFail();

        $request->validate([
            'nim' => 'required|unique:users,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $mahasiswa->update($request->only(['nim', 'nama', 'email', 'prodi_id', 'jurusan_id']));

        return redirect()->route('mahasiswa.akun.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus akun
    public function destroy($id)
    {
        $mahasiswa = User::where('role', 'mahasiswa')->findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.akun.index')->with('success', 'Akun berhasil dihapus.');
    }
}
