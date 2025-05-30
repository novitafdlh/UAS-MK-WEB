<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;     // Import model User (untuk akun dosen & mahasiswa)
use App\Models\Jurusan;  // Import model Jurusan
use App\Models\Prodi;    // Import model Prodi

class DashboardController extends Controller
{
    public function index()
{
    $mahasiswas = \App\Models\User::where('role', 'mahasiswa')->get();
    $dosens = \App\Models\User::where('role', 'dosen')->get();
    $totalProdi = \App\Models\Prodi::count();
    $totalJurusan = \App\Models\Jurusan::count();
    $totalMataKuliah = \App\Models\MataKuliah::count();
    $totalJadwal = \App\Models\Jadwal::count();
    $totalKRS = \App\Models\KRS::count();

    return view('admin.dashboard', compact(
        'mahasiswas',
        'dosens',
        'totalProdi',
        'totalJurusan',
        'totalMataKuliah',
        'totalJadwal',
        'totalKRS'
    ));
}


    public function show($id) {
        $akun = User::findOrFail($id);
        return view('admin.akun.show', compact('akun'));
    }

    public function edit($id) {
        $akun = User::findOrFail($id);
        $prodis = Prodi::all();
        $jurusans = Jurusan::all();
        return view('admin.akun.edit', compact('akun', 'prodis', 'jurusans'));
    }

    public function update(Request $request, $id) {
        $akun = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $akun->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $akun->update($request->only(['name', 'email', 'prodi_id', 'jurusan_id']));

        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil diperbarui.');
    }
}