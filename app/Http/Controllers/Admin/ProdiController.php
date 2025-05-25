<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Jurusan;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::with('jurusan')->get();
        return view('admin.prodi.index', compact('prodi'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.prodi.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',
            'nama' => 'required|string|max:255',
        ]);

        Prodi::create([
            'jurusan_id' => $request->jurusan_id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.prodi.index')->with('success', 'Prodi created successfully.');
    }

    public function edit(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('admin.prodi.edit', compact('prodi', 'jurusans'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',
            'nama' => 'required|string|max:255',
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update([
            'jurusan_id' => $request->jurusan_id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.prodi.index')->with('success', 'Prodi updated successfully.');
    }

    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('admin.prodi.index')->with('success', 'Prodi deleted successfully.');
    }
}
