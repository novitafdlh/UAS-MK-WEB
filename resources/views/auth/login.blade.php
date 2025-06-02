@extends('layouts.app') {{-- Tetap menggunakan layouts/app --}}

@section('title', 'Login Pengguna')

@section('content')
    {{-- Hapus kelas w-full max-w-md dari div ini, karena lebar sudah diatur di layout guest --}}
    <div class="p-8 bg-white rounded-2xl shadow-2xl hover:shadow-red-300 transition-all duration-300">

        <div class="flex justify-center items-center space-x-6 mb-6">
            <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo UNTAD" class="h-20 w-20 object-contain hover:scale-105 transition duration-200" />
            <img src="{{ asset('img/tutwurihandayani.jpg') }}" alt="Logo Tut Wuri" class="h-20 w-20 object-contain hover:scale-105 transition duration-200" />
        </div>

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Sistem Informasi Akademik</h1>
            <p class="text-gray-500 font-medium">Universitas Tadulako</p>
            <div class="w-16 h-1 bg-gradient-to-r from-red-600 to-red-700 mx-auto mt-3 rounded-full"></div>
        </div>

        <h2 class="text-2xl font-bold text-center text-red-700 mb-6">Login</h2>

        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-400"
                    aria-label="Email Address" />
            </div>

            <div>
                <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-400"
                    aria-label="Password" />
            </div>

            <div>
                <label for="role" class="block mb-1 text-sm font-medium text-gray-700">Login Sebagai</label>
                <select id="role" name="role" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-400"
                    aria-label="Select Role">
                    <option value="">-- Pilih Role --</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                </select>
            </div>

            <button type="submit"
                class="w-full py-3 px-4 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg shadow-lg font-semibold hover:scale-105 transition-all">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.387 0 4.61.554 6.879 1.804M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                    Masuk ke Sistem
                </span>
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Belum punya akun?</p>
            <a href="{{ route('register') }}"
                class="inline-block mt-2 px-6 py-2 text-red-600 border border-red-600 rounded-full hover:bg-red-600 hover:text-white transition-all">
                Daftar Sekarang
            </a>
        </div>
    </div>
@endsection