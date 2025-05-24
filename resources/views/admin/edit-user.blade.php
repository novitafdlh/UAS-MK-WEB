@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pengguna</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label>Role</label>
            <select name="role" required>
                <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            </select>
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
@endsection
