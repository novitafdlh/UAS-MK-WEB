<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = User::with(['prodi', 'jurusan'])
            ->where('role', 'mahasiswa')
            ->get();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.mahasiswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:users,nim',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'password' => 'required|min:8|confirmed',
        ]);

        $validatedData['role'] = 'mahasiswa';
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = User::where('role', 'mahasiswa')->with(['prodi', 'jurusan'])->findOrFail($id);
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = User::where('role', 'mahasiswa')->findOrFail($id);

        $validatedData = $request->validate([
            'nim' => 'required|unique:users,nim,' . $mahasiswa->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $mahasiswa->update($validatedData);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = User::where('role', 'mahasiswa')->findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus.');
    }
}