@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100"> {{-- Latar belakang halaman --}}
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-xl space-y-6"> {{-- Container form --}}
        <h2 class="text-3xl font-extrabold text-gray-900 text-center">Daftar Akun Mahasiswa</h2>
        <p class="text-center text-gray-600">Isi data diri Anda untuk membuat akun</p>

        {{-- Pesan error global --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Registrasi Gagal!</strong>
                <span class="block sm:inline">Periksa kembali input Anda.</span>
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm
                       @error('name') border-red-500 @enderror"
                       placeholder="Masukkan nama lengkap Anda">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Mahasiswa</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm
                       @error('email') border-red-500 @enderror"
                       placeholder="Contoh: nama@mahasiswa.ac.id">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm
                       @error('password') border-red-500 @enderror"
                       placeholder="Minimal 8 karakter">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                       placeholder="Ketik ulang password">
            </div>

            <input type="hidden" name="role" value="mahasiswa"> {{-- Role default untuk pendaftaran ini --}}

            <div>
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Daftar Akun
                </button>
            </div>
        </form>

        <div class="text-center mt-6">
            <p class="text-gray-600">Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Login di sini
                </a>
            </p>
        </div>
    </div>
</div>
@endsection