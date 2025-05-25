@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-3xl font-bold text-center text-red-700 mb-10">Edit Akun Mahasiswa</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.mahasiswa.akun.store') }}" method="POST" class="space-y-5">
        @csrf

        <label class="block font-semibold">Nama</label>
        <input 
            type="text" 
            name="name" 
            value="{{ old('name') }}" 
            required 
            class="w-full border rounded px-3 py-2"
        >

        <label class="block font-semibold">Email</label>
        <input 
            type="email" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            class="w-full border rounded px-3 py-2"
        >

        <label class="block font-semibold">Role</label>
        <select 
            name="role" 
            class="w-full border rounded px-3 py-2" 
            required
        >
            <option value="" disabled selected>Pilih Role</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select>

        <label class="block font-semibold">Password</label>
        <input 
            type="password" 
            name="password" 
            required 
            class="w-full border rounded px-3 py-2"
        >

        <label class="block font-semibold">Konfirmasi Password</label>
        <input 
            type="password" 
            name="password_confirmation" 
            required 
            class="w-full border rounded px-3 py-2"
        >

        <div class="flex items-center gap-4 pt-4">
            <button 
                type="submit" 
                class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-800 transition"
            >
                Simpan
            </button>
            <a 
                href="{{ route('admin.mahasiswa.akun.index') }}" 
                class="text-gray-600 hover:underline"
            >
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
