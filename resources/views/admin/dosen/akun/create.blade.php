@extends('layouts.admin')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-white to-white min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
                    Tambah Akun Dosen
                </h1>
                <p class="text-black-600">Tambahkan akun dosen ke sistem</p>
            </div>
           
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg mt-10">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-red-500">Tambah Akun Dosen</h1>

    @if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-300 text-red-700 px-5 py-4 rounded-lg shadow-sm">
        <strong class="font-semibold">Oops! Ada masalah:</strong>
        <span class="block mt-1">Pastikan semua field terisi dengan benar.</span>
        <ul class="mt-3 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.dosen.akun.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-semibold text-black mb-2">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full px-4 py-3 border border-gray-400 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:outline-none transition
                   @error('name') border-red-500 @enderror"
                   required placeholder="Masukkan nama dosen" />
            @error('name')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-black mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full px-4 py-3 border border-gray-400 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:outline-none transition
                   @error('email') border-red-500 @enderror"
                   required placeholder="Masukkan alamat email" />
            @error('email')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="role" class="block text-sm font-semibold text-black mb-2">Role</label>
            <select name="role" id="role" disabled
                    class="w-full px-4 py-3 border border-gray-400 rounded-md bg-gray-100 cursor-not-allowed focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                <option value="dosen" selected>Dosen</option>
            </select>
            <input type="hidden" name="role" value="dosen" />
            @error('role')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold white text-black mb-2">Password</label>
            <input type="password" name="password" id="password"
                   class="w-full px-4 py-3 border border-gray-400 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:outline-none transition
                   @error('password') border-red-500 @enderror"
                   required placeholder="Masukkan password" />
            @error('password')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-black mb-2">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full px-4 py-3 border border-gray-300 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:outline-none transition"
                   required placeholder="Konfirmasi password" />
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-red-600 hover:bg-from-red-300  text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                Simpan Akun
            </button>
        </div>
    </form>
</div>
@endsection
