@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Akun Dosen</h1>

    {{-- Tampilkan pesan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Arahkan form ke route update dengan ID dosenUser --}}
    <form action="{{ route('admin.dosen.akun.update', $dosenUser->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT') {{-- Gunakan metode PUT untuk update --}}

        <div>
            <label for="name" class="block font-semibold mb-1">Nama</label>
            {{-- Tampilkan nilai lama (old input) atau data dari $dosenUser --}}
            <input type="text" name="name" id="name" value="{{ old('name', $dosenUser->name) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            {{-- Tampilkan nilai lama (old input) atau data dari $dosenUser --}}
            <input type="email" name="email" id="email" value="{{ old('email', $dosenUser->email) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('email')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Field password dibuat opsional --}}
        <div>
            <label for="password" class="block font-semibold mb-1">Password (biarkan kosong jika tidak ingin diubah)</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="password_confirmation" class="block font-semibold mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <input type="hidden" name="role" value="dosen"> {{-- Pastikan role tetap 'dosen' --}}

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                Update
            </button>
            <a href="{{ route('admin.dosen.akun.index') }}" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection