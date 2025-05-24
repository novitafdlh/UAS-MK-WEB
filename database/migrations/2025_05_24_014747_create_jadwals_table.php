<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Prodi;
use App\Models\MataKuliah;
use App\Models\User; // Anggap dosen disimpan di tabel users

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil jadwal beserta relasi prodi, matakuliah, dan dosen
        $jadwals = Jadwal::with(['prodi', 'mataKuliah', 'dosen'])->get();

        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        $mataKuliah = MataKuliah::all();
        $dosens = User::where('role', 'dosen')->get(); // Asumsi ada kolom role

        return view('admin.jadwal.create', compact('prodis', 'mataKuliah', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required|exists:prodis,id',
            'mata_kuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_id' => 'required|exists:users,id',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|string|max:10',
            'jam_selesai' => 'required|string|max:10',
            'ruangan' => 'required|string|max:50',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $prodis = Prodi::all();
        $mataKuliah = MataKuliah::all();
        $dosens = User::where('role', 'dosen')->get();

        return view('admin.jadwal.edit', compact('jadwal', 'prodis', 'mataKuliah', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required|exists:prodis,id',
            'mata_kuliah_id' => 'required|exists:matakuliahs,id',
            'dosen_id' => 'required|exists:users,id',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|string|max:10',
            'jam_selesai' => 'required|string|max:10',
            'ruangan' => 'required|string|max:50',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
