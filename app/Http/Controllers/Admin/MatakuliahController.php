<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Dosen;
use App\Models\Jurusan;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return view('admin.matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        $jurusans = Jurusan::all();
        $dosens = Dosen::all();

        return view('admin.matakuliah.create', compact('prodis', 'jurusans', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliahs,kode',
            'nama' => 'required',
            'sks' => 'required|integer',
            'jurusan' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
            'dosen_id' => 'nullable|exists:dosens,id',
        ]);

        Matakuliah::create($request->all());

        return redirect()->route('admin.matakuliah.index')->with('success', 'Matakuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matakuliah $matakuliah)
    {
        $prodis = Prodi::all();
        $jurusans = Jurusan::all();
        $dosens = Dosen::all();
        return view('admin.matakuliah.edit', compact('matakuliah', 'prodis', 'jurusans', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliahs,kode,' . $matakuliah->id,
            'nama' => 'required',
            'sks' => 'required|integer',
            'jurusan' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
        ]);

        $matakuliah->update($request->all());

        return redirect()->route('admin.matakuliah.index')->with('success', 'Matakuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()->route('admin.matakuliah.index')->with('success', 'Matakuliah berhasil dihapus.');
    }
}
