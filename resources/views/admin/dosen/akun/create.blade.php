@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Akun Dosen Baru</h1>

    @if ($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.dosen.akun.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <label class="block mb-2 font-semibold">Nama</label>
        <input type="text" name="name" value="{{ old('name') }}" required class="w-full border rounded px-3 py-2 mb-4">

        <label class="block mb-2 font-semibold">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded px-3 py-2 mb-4">

        <label class="block mb-2 font-semibold">Role</label>
        <select name="role" class="w-full border rounded px-3 py-2 mb-4" required>
            <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
        </select>

        <label class="block mb-2 font-semibold">Password</label>
        <input type="password" name="password" required class="w-full border rounded px-3 py-2 mb-4">

        <label class="block mb-2 font-semibold">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" required class="w-full border rounded px-3 py-2 mb-6">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('admin.dosen.akun.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
