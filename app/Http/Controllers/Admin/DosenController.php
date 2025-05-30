<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = User::with(['prodi', 'jurusan'])
            ->where('role', 'dosen')
            ->get();
        return view('admin.dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.dosen.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nidn' => 'required|unique:users,nidn',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'password' => 'required|min:8|confirmed',
        ]);

        $validatedData['role'] = 'dosen';
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('admin.dosen.index')->with('success', 'Data Dosen berhasil ditambahkan.');
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
        $dosen = User::where('role', 'dosen')->with(['prodi', 'jurusan'])->findOrFail($id);
        $jurusans = Jurusan::with('prodis')->get();
        return view('admin.dosen.edit', compact('dosen', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dosen = User::where('role', 'dosen')->findOrFail($id);

        $validatedData = $request->validate([
            'nidn' => 'required|unique:users,nidn,' . $dosen->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $dosen->id,
            'prodi_id' => 'required|exists:prodis,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $dosen->update($validatedData);

        return redirect()->route('admin.dosen.index')->with('success', 'Data Dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = User::where('role', 'dosen')->findOrFail($id);
        $dosen->delete();

        return redirect()->route('admin.dosen.index')->with('success', 'Data Dosen berhasil dihapus.');
    }
}