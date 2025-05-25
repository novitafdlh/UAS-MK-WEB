<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['dosen', 'mahasiswa'])->get();
        return view('admin.user-list', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:dosen,mahasiswa',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User berhasil dihapus');
    }

    public function create()
    {
        return view('admin.create-user');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:dosen,mahasiswa',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.create-user')->with('success', 'User berhasil dibuat!');
    }

    // app/Models/User.php

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
