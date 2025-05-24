@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Akun Dosen / Mahasiswa</h2>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.store-user') }}" method="POST">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <label>Role</label>
            <select name="role" required>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
