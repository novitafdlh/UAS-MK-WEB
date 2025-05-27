<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Jurusan;

class AkunController extends Controller
{
    public function index()
    {
        // Ambil data dosen yang sedang login
        $dosen = Auth::user()->dosen;
        return view('dosen.akun.index', compact('dosen'));
    }

    public function edit()
    {
        $dosen = Auth::user()->dosen;
        $prodis = \App\Models\Prodi::all();
        $jurusans = \App\Models\Jurusan::all();
        return view('dosen.akun.edit', compact('dosen', 'prodis', 'jurusans'));
    }

    public function update(Request $request)
    {
        $dosen = Auth::user()->dosen;

        $request->validate([
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $dosen->update($request->only([
            'nidn', 'nama', 'email', 'prodi_id', 'jurusan_id'
        ]));

        return redirect()->route('dosen.akun.index')->with('success', 'Data pribadi berhasil diperbarui.');
    }

    public function create()
    {
        $user = Auth::user();
        // Jika sudah punya data dosen, redirect ke edit
        if ($user->dosen) {
            return redirect()->route('dosen.akun.edit');
        }
        $prodis = Prodi::all();
        $jurusans = Jurusan::all();
        return view('dosen.akun.create', compact('prodis', 'jurusans'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email',
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        Dosen::create([
            'user_id' => $user->id,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'prodi_id' => $request->prodi_id,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->route('dosen.akun.edit')->with('success', 'Data pribadi berhasil disimpan.');
    }
}
