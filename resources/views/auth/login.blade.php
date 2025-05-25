@extends('layouts.app') {{-- Pastikan layout ini tersedia dan berfungsi dengan baik --}}

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100"> {{-- Latar belakang halaman --}}
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-xl space-y-6"> {{-- Container form --}}
        <h2 class="text-3xl font-extrabold text-gray-900 text-center">Selamat Datang!</h2> {{-- Judul lebih menonjol --}}
        <p class="text-center text-gray-600">Masuk ke akun Anda</p>

        {{-- Pesan error umum --}}
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Login Gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5"> {{-- Jarak antar elemen form --}}
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm
                       @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm
                       @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Masuk sebagai</label>
                <select name="role" id="role" required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm
                        @error('role') border-red-500 @enderror">
                    <option value="" disabled {{ !old('role') ? 'selected' : '' }}>Pilih Role</option>
                    <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                    {{-- Anda bisa menambahkan role lain di sini jika ada --}}
                </select>
                @error('role')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Login
                </button>
            </div>
        </form>

        {{-- Tombol Register --}}
        <div class="text-center mt-6"> {{-- Margin atas lebih besar --}}
            <p class="text-gray-600">Belum punya akun?</p>
            <a href="{{ route('register') }}"
               class="mt-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Daftar sebagai Mahasiswa
            </a>
        </div>
    </div>
</div>
@endsection