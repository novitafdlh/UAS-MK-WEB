<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Jurusan;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::with('prodi.jurusan')->get();
        return view('admin.dosen.data.index', compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua jurusan beserta prodi-prodi yang dimilikinya
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.dosen.data.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama' => 'required',
            'email' => 'required|email|unique:dosens,email',
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        // Pastikan prodi_id yang dipilih memang bagian dari jurusan_id yang dipilih
        $jurusan = Jurusan::find($request->jurusan_id);
        if (!$jurusan || !$jurusan->prodis->contains('id', $request->prodi_id)) {
            return back()->withErrors(['prodi_id' => 'Program Studi yang dipilih tidak sesuai dengan Jurusan.'])->withInput();
        }

        Dosen::create($request->all());
        return redirect()->route('admin.dosen.data.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dosen = Dosen::with('prodi.jurusan')->findOrFail($id);
        // Ambil semua jurusan beserta prodi-prodi yang dimilikinya
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.dosen.data.edit', compact('dosen', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        // Pastikan prodi_id yang dipilih memang bagian dari jurusan_id yang dipilih
        $jurusan = Jurusan::find($request->jurusan_id);
        if (!$jurusan || !$jurusan->prodis->contains('id', $request->prodi_id)) {
            return back()->withErrors(['prodi_id' => 'Program Studi yang dipilih tidak sesuai dengan Jurusan.'])->withInput();
        }

        $dosen->update($request->all());
        return redirect()->route('admin.dosen.data.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('admin.dosen.data.index')->with('success', 'Data berhasil dihapus');
    }
}