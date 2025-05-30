<?php

namespace App\Http\Controllers\Dosen; // Mengubah namespace ke Dosen

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jurusan; // Menambahkan import untuk Jurusan
use App\Models\Prodi;   // Menambahkan import untuk Prodi
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        $dosen = User::where('role', 'dosen')->where('id', Auth::id())->first();
        return view('dosen.akun.index', compact('dosen')); // Mengubah view path ke dosen.akun.index
    }

    public function show($id)
    {
        $akun = User::where('role', 'dosen')->findOrFail($id);
        return view('dosen.akun.show', compact('akun')); // Mengubah view path ke dosen.akun.show
    }

    public function edit()
    {
        $dosen = User::where('role', 'dosen')->where('id', Auth::id())->first();
        $prodis = Prodi::all();
        $jurusans = Jurusan::all();
        
        return view('dosen.akun.edit', compact('dosen', 'prodis', 'jurusans'));
    }

    public function update(Request $request)
    {
        $dosen = User::where('role', 'dosen')->where('id', Auth::id())->firstOrFail();

        $request->validate([
            'nidn' => 'required|unique:users,nidn,' . $dosen->id,
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:users,email,' . $dosen->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $dosen->update($request->only(['nidn', 'name', 'email', 'prodi_id', 'jurusan_id']));

        return redirect()->route('dosen.akun.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dosen = User::where('role', 'dosen')->findOrFail($id);
        $dosen->delete();

        return redirect()->route('dosen.akun.index')->with('success', 'Akun berhasil dihapus.');
    }
}