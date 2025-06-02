@extends('layouts.mahasiswa')

@section('title', 'Dashboard')

@section('content')
<main class="flex-1 p-3 md:p-4 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Header --}}
    <header class="bg-white rounded-xl shadow-sm border border-dark-blue-100 p-4 mb-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-3">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <img src="{{ asset('img/untad-new.jpeg') }}" 
                         alt="Logo Untad" 
                         class="w-12 h-12 object-contain rounded-lg shadow-sm ring-1 ring-dark-blue-100" />
                </div>
                <div>
                    <h1 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent">
                        Universitas Tadulako
                    </h1>
                    <p class="text-xs text-gray-500 font-medium">Sistem Informasi Akademik Mahasiswa</p>
                </div>
            </div>
            <div class="text-center md:text-right">
                <p class="text-gray-600 text-xs">Selamat datang,</p>
                <p class="font-bold text-dark-blue-700 text-base">{{ auth()->user()->name }}</p>
                <span class="inline-block px-2 py-0.5 bg-dark-blue-100 text-dark-blue-700 text-xs rounded-full font-medium mt-0.5">
                    Mahasiswa Aktif
                </span>
            </div>
        </div>
    </header>

    {{-- Page Title --}}
    <div class="text-center mb-6">
        <h2 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-1">
            Dashboard Mahasiswa
        </h2>
        <div class="w-20 h-0.5 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 mx-auto rounded-full"></div>
    </div>

    {{-- Statistik Box --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        {{-- Card 1 --}}
        <div class="group relative bg-white rounded-xl shadow-sm border border-dark-blue-100 p-4 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
            <div class="absolute top-3 right-3 w-10 h-10 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-lg flex items-center justify-center shadow-md">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-gray-700 mb-1">Jumlah Mahasiswa</h3>
            <p class="text-2xl font-bold text-dark-blue-600 mb-0.5">37,964</p>
            <p class="text-xs text-gray-500">Mahasiswa aktif</p>
        </div>

        {{-- Card 2 --}}
        <div class="group relative bg-white rounded-xl shadow-sm border border-dark-blue-100 p-4 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
            <div class="absolute top-3 right-3 w-10 h-10 bg-gradient-to-br from-red-accent-400 to-red-accent-500 rounded-lg flex items-center justify-center shadow-md">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-gray-700 mb-1">Program Studi</h3>
            <p class="text-2xl font-bold text-red-accent-600 mb-0.5">51</p>
            <p class="text-xs text-gray-500">Program studi aktif</p>
        </div>

        {{-- Card 3 --}}
        <div class="group relative bg-white rounded-xl shadow-sm border border-dark-blue-100 p-4 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 sm:col-span-2 lg:col-span-1">
            <div class="absolute top-3 right-3 w-10 h-10 bg-gradient-to-br from-dark-blue-500 to-red-accent-500 rounded-lg flex items-center justify-center shadow-md">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-gray-700 mb-1">Jumlah Dosen</h3>
            <p class="text-2xl font-bold text-dark-blue-700 mb-0.5">1,139</p>
            <p class="text-xs text-gray-500">Dosen aktif</p>
        </div>
    </div>

    {{-- Visi & Misi UNTAD --}}
    <div class="bg-white rounded-xl shadow-sm border border-dark-blue-100 overflow-hidden mb-8">
        {{-- Header Section --}}
        <div class="bg-gradient-to-r from-dark-blue-500 to-red-accent-500 p-4 text-white">
            <h2 class="text-xl md:text-2xl font-bold text-center flex items-center justify-center gap-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                Visi & Misi Universitas Tadulako
            </h2>
        </div>

        <div class="p-4 md:p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Visi Section --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-lg flex items-center justify-center">
                        <span class="text-white text-lg">🎯</span>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-800">Visi</h3>
                </div>
                <div class="bg-gradient-to-r from-dark-blue-50 to-red-accent-50 rounded-lg p-4 border-l-4 border-dark-blue-500 h-50">
                    <blockquote class="text-gray-700 text-sm leading-relaxed italic font-medium">
                        "Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup."
                    </blockquote>
                </div>
            </div>

            {{-- Misi Section --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-red-accent-400 to-red-accent-500 rounded-lg flex items-center justify-center">
                        <span class="text-white text-lg">📌</span>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-800">Misi</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex gap-3 p-3 bg-gradient-to-r from-dark-blue-50 to-red-accent-50 rounded-lg border border-dark-blue-100">
                        <div class="flex-shrink-0 w-6 h-6 bg-dark-blue-500 text-white rounded-full flex items-center justify-center font-bold text-xs">1</div>
                        <p class="text-gray-700 leading-relaxed text-sm">Menyelenggarakan pendidikan yang bermutu, modern, dan relevan menuju pencapaian standar internasional dalam pengembangan IPTEKS berwawasan lingkungan hidup.</p>
                    </div>
                    <div class="flex gap-3 p-3 bg-gradient-to-r from-dark-blue-50 to-red-accent-50 rounded-lg border border-dark-blue-100">
                        <div class="flex-shrink-0 w-6 h-6 bg-red-accent-500 text-white rounded-full flex items-center justify-center font-bold text-xs">2</div>
                        <p class="text-gray-700 leading-relaxed text-sm">Menyelenggarakan penelitian yang bermutu untuk pengembangan IPTEKS berwawasan lingkungan hidup.</p>
                    </div>
                    <div class="flex gap-3 p-3 bg-gradient-to-r from-dark-blue-50 to-red-accent-50 rounded-lg border border-dark-blue-100">
                        <div class="flex-shrink-0 w-6 h-6 bg-dark-blue-600 text-white rounded-full flex items-center justify-center font-bold text-xs">3</div>
                        <p class="text-gray-700 leading-relaxed text-sm">Menyelenggarakan pengabdian kepada masyarakat sebagai pemanfaatan hasil pendidikan dan hasil penelitian yang dibutuhkan dalam pembangunan masyarakat.</p>
                    </div>
                    <div class="flex gap-3 p-3 bg-gradient-to-r from-dark-blue-50 to-red-accent-50 rounded-lg border border-dark-blue-100">
                        <div class="flex-shrink-0 w-6 h-6 bg-red-accent-600 text-white rounded-full flex items-center justify-center font-bold text-xs">4</div>
                        <p class="text-gray-700 leading-relaxed text-sm">Menyelenggarakan reformasi birokrasi dan kerjasama regional, nasional dan internasional.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-4">
        <div class="inline-flex items-center gap-1 px-3 py-1.5 bg-white rounded-full shadow-sm border border-dark-blue-100">
            <svg class="w-3 h-3 text-dark-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <span class="text-xs text-gray-600">
                &copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.
            </span>
        </div>
    </footer>
</main>
@endsection