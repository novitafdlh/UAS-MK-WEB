<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;

class AkunMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaUsers = User::where('role', 'mahasiswa')->get();
        return view('admin.mahasiswa.akun.index', compact('mahasiswaUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:mahasiswa',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

            Mahasiswa::create([
                'user_id' => $user->id, // Ini adalah kunci penghubung!
                'nim' => $request->nim ?? 'NIM-' . Str::random(8), // Ambil dari request atau generate otomatis
                'nama' => $user->name, // Ambil dari nama user
                'email' => $user->email, // Ambil dari email user
                'prodi_id' => $request->prodi_id ?? 1, // Ambil dari request atau set ID prodi default
                'jurusan_id' => $request->jurusan_id ?? 1, // Ambil dari request atau set ID jurusan default
            ]);

        return redirect()->route('admin.mahasiswa.akun.index')->with('success', 'Akun mahasiswa berhasil dibuat.');
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
        $user = User::findOrFail($id);
        return view('admin.mahasiswa.akun.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:mahasiswa',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.mahasiswa.akun.index')->with('success', 'Akun mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.mahasiswa.akun.index')->with('success', 'Akun mahasiswa berhasil dihapus.');
    }
}
