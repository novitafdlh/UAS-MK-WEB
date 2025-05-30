<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Jurusan;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['jurusan', 'prodi', 'mata_kuliah', 'dosen'])->get();
        return view('admin.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = \App\Models\Jurusan::all();
        $prodis = Prodi::all();
        $matakuliahs = Matakuliah::all();
        $dosens = User::where('role', 'dosen')->get();

        return view('admin.jadwal.create', compact('jurusans', 'prodis', 'matakuliahs', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',
            'prodi_id' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|string|max:10',
            'jam_selesai' => 'required|string|max:10',
            'ruangan' => 'required|string|max:50',
        ]);

        $jadwal = Jadwal::create([
            'jurusan_id' => $request->jurusan_id,
            'prodi_id' => $request->prodi_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'dosen_id' => $request->dosen_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'ruangan' => $request->ruangan,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::with(['jurusan', 'prodi', 'mata_kuliah', 'dosen'])->findOrFail($id);

        $jurusans = \App\Models\Jurusan::all();
        $prodis = Prodi::all();
        $matakuliahs = Matakuliah::all();
        $dosens = User::where('role', 'dosen')->get();

        return view('admin.jadwal.edit', compact('jadwal', 'jurusans', 'prodis', 'matakuliahs', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',
            'prodi_id' => 'required',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|string|max:10',
            'jam_selesai' => 'required|string|max:10',
            'ruangan' => 'required|string|max:50',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update([
            'jurusan_id' => $request->jurusan_id,
            'prodi_id' => $request->prodi_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'dosen_id' => $request->dosen_id,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
