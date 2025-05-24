<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AkunDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosenUsers = User::where('role', 'dosen')->get();
        return view('admin.dosen.akun.index', compact('dosenUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dosen.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:dosen',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'dosen',
        ]);

        return redirect()->route('admin.dosen.akun.index')->with('success', 'Akun dosen berhasil dibuat.');
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
        $dosenUser = User::findOrFail($id);
        return view('admin.dosen.akun.edit', compact('dosenUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosenUser = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $dosenUser->id,
            'role' => 'required|in:dosen',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $dosenUser->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'dosen',
            'password' => $request->password ? Hash::make($request->password) : $dosenUser->password,
        ]);

        return redirect()->route('admin.dosen.akun.index')->with('success', 'Akun dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosenUser = User::findOrFail($id);
        $dosenUser->delete();

        return redirect()->route('admin.dosen.akun.index')->with('success', 'Akun dosen berhasil dihapus.');
    }
}
