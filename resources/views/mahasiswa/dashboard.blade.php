@extends('layouts.mahasiswa')

@section('title', 'Dashboard')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-rose-50 to-red-50 min-h-screen">
    {{-- Header --}}
    <header class="bg-white rounded-2xl shadow-sm border border-rose-100 p-6 mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <img src="{{ asset('img/untad-new.jpeg') }}" 
                         alt="Logo Untad" 
                         class="w-14 h-14 object-contain rounded-xl shadow-md ring-2 ring-rose-100" />
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent">
                        Universitas Tadulako
                    </h1>
                    <p class="text-sm text-rose-500 font-medium">Sistem Informasi Akademik Mahasiswa</p>
                </div>
            </div>
            <div class="text-center md:text-right">
                <p class="text-gray-600 text-sm">Selamat datang,</p>
                <p class="font-bold text-rose-700 text-lg">{{ auth()->user()->name }}</p>
                <span class="inline-block px-3 py-1 bg-rose-100 text-rose-700 text-xs rounded-full font-medium mt-1">
                    Mahasiswa Aktif
                </span>
            </div>
        </div>
    </header>

    {{-- Page Title --}}
    <div class="text-center mb-8">
        <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent mb-2">
            Dashboard Mahasiswa
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 mx-auto rounded-full"></div>
    </div>

    {{-- Statistik Box --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        {{-- Card 1 --}}
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-rose-400 to-rose-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Jumlah Mahasiswa</h3>
            <p class="text-3xl font-bold text-rose-600 mb-1">37,964</p>
            <p class="text-sm text-gray-500">Mahasiswa aktif</p>
        </div>

        {{-- Card 2 --}}
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-red-400 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Program Studi</h3>
            <p class="text-3xl font-bold text-red-600 mb-1">51</p>
            <p class="text-sm text-gray-500">Program studi aktif</p>
        </div>

        {{-- Card 3 --}}
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 sm:col-span-2 lg:col-span-1">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-rose-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Jumlah Dosen</h3>
            <p class="text-3xl font-bold text-rose-700 mb-1">1,139</p>
            <p class="text-sm text-gray-500">Dosen aktif</p>
        </div>
    </div>

    {{-- Visi & Misi UNTAD --}}
    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden mb-12">
        {{-- Header Section --}}
        <div class="bg-gradient-to-r from-rose-500 to-red-500 p-6 text-white">
            <h2 class="text-2xl md:text-3xl font-bold text-center flex items-center justify-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                Visi & Misi Universitas Tadulako
            </h2>
        </div>

        <div class="p-6 md:p-8">
            {{-- Visi --}}
            <div class="mb-10">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-rose-400 to-rose-500 rounded-xl flex items-center justify-center">
                        <span class="text-white text-xl">🎯</span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">Visi</h3>
                </div>
                <div class="bg-gradient-to-r from-rose-50 to-red-50 rounded-xl p-6 border-l-4 border-rose-500">
                    <blockquote class="text-gray-700 text-lg leading-relaxed italic font-medium">
                        "Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup."
                    </blockquote>
                </div>
            </div>

            {{-- Misi --}}
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-400 to-red-500 rounded-xl flex items-center justify-center">
                        <span class="text-white text-xl">📌</span>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">Misi</h3>
                </div>
                <div class="space-y-4">
                    <div class="flex gap-4 p-4 bg-gradient-to-r from-rose-50 to-red-50 rounded-xl border border-rose-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-rose-500 text-white rounded-full flex items-center justify-center font-bold text-sm">1</div>
                        <p class="text-gray-700 leading-relaxed">Menyelenggarakan pendidikan yang bermutu, modern, dan relevan menuju pencapaian standar internasional dalam pengembangan IPTEKS berwawasan lingkungan hidup.</p>
                    </div>
                    <div class="flex gap-4 p-4 bg-gradient-to-r from-rose-50 to-red-50 rounded-xl border border-rose-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center font-bold text-sm">2</div>
                        <p class="text-gray-700 leading-relaxed">Menyelenggarakan penelitian yang bermutu untuk pengembangan IPTEKS berwawasan lingkungan hidup.</p>
                    </div>
                    <div class="flex gap-4 p-4 bg-gradient-to-r from-rose-50 to-red-50 rounded-xl border border-rose-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-rose-600 text-white rounded-full flex items-center justify-center font-bold text-sm">3</div>
                        <p class="text-gray-700 leading-relaxed">Menyelenggarakan pengabdian kepada masyarakat sebagai pemanfaatan hasil pendidikan dan hasil penelitian yang dibutuhkan dalam pembangunan masyarakat.</p>
                    </div>
                    <div class="flex gap-4 p-4 bg-gradient-to-r from-rose-50 to-red-50 rounded-xl border border-rose-100">
                        <div class="flex-shrink-0 w-8 h-8 bg-red-600 text-white rounded-full flex items-center justify-center font-bold text-sm">4</div>
                        <p class="text-gray-700 leading-relaxed">Menyelenggarakan reformasi birokrasi dan kerjasama regional, nasional dan internasional.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-6">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-sm border border-rose-100">
            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <span class="text-sm text-gray-600">
                &copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.
            </span>
        </div>
    </footer>
</main>
@endsection
