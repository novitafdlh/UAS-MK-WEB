<?php declare(strict_types=1);?>
@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<main class="flex-1 p-3 md:p-4 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Header --}}
    <header class="bg-white rounded-xl shadow-sm border border-dark-blue-100 p-4 mb-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-3">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <img src="{{ asset('img/untad-new.jpeg') }}"
                         alt="Logo Untad"
                         class="w-12 h-12 object-contain rounded-lg shadow-md ring-1 ring-dark-blue-100" />
                </div>
                <div>
                    <h1 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-dark-blue-500 to-dark-blue-700 bg-clip-text text-transparent">
                        Universitas Tadulako
                    </h1>
                    <p class="text-xs text-dark-blue-500 font-medium">Sistem Informasi Akademik - Admin Panel</p>
                </div>
            </div>
            <div class="text-center md:text-right">
                <p class="text-gray-600 text-xs">Selamat datang,</p>
                <p class="font-bold text-dark-blue-700 text-base">{{ auth()->user()->name }}</p>
            </div>
        </div>
    </header>

    {{-- Page Title --}}
    <div class="text-center mb-6">
        <h2 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-1">
            Dashboard Administrator
        </h2>
        <div class="w-20 h-1 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 mx-auto rounded-full"></div>
    </div>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        {{-- Card 1: Mahasiswa --}}
        <div class="group relative bg-gradient-to-br from-red-accent-500 to-red-accent-700 rounded-xl shadow-lg border border-red-accent-100 p-4 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
            <div class="absolute top-3 right-3 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-white mb-1">Total Mahasiswa</h3>
            <p class="text-2xl font-bold text-white mb-0.5">3,796</p>
            <p class="text-xs text-red-accent-100">Mahasiswa aktif</p>
        </div>

        {{-- Card 2: Dosen --}}
        <div class="group relative bg-gradient-to-br from-red-accent-500 to-red-accent-700 rounded-xl shadow-lg border border-red-accent-100 p-4 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
            <div class="absolute top-3 right-3 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-white mb-1">Total Dosen</h3>
            <p class="text-2xl font-bold text-white mb-0.5">1,139</p>
            <p class="text-xs text-red-accent-100">Dosen aktif</p>
        </div>

        {{-- Card 3: Program Studi --}}
        <div class="group relative bg-gradient-to-br from-red-accent-500 to-red-accent-700 rounded-xl shadow-lg border border-red-accent-100 p-4 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
            <div class="absolute top-3 right-3 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-white mb-1">Program Studi</h3>
            <p class="text-2xl font-bold text-white mb-0.5">51</p>
            <p class="text-xs text-red-accent-100">Program aktif</p>
        </div>

        {{-- Card 4: Jurusan --}}
        <div class="group relative bg-gradient-to-br from-red-accent-500 to-red-accent-700 rounded-xl shadow-lg border border-red-accent-100 p-4 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
            <div class="absolute top-3 right-3 w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                </svg>
            </div>
            <h3 class="text-base font-semibold text-white mb-1">Jurusan</h3>
            <p class="text-2xl font-bold text-white mb-0.5">12</p>
            <p class="text-xs text-red-accent-100">Jurusan aktif</p>
        </div>
    </div>

    {{-- Quick Actions & Info Grid --}}
    {{-- Menggunakan items-stretch untuk memastikan tinggi kolom sejajar --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6 items-stretch">
        {{-- Quick Actions --}}
        <div class="lg:col-span-2 h-full">
            <div class="bg-white rounded-xl shadow-sm border border-dark-blue-100 p-4 h-full flex flex-col"> {{-- Menambahkan flex flex-col di sini --}}
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-7 h-7 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-md flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Aksi Cepat</h3>
                </div>

                {{-- Menambahkan flex-1 agar grid mengambil sisa ruang vertikal --}}
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 flex-1">
                    {{-- Tambah Mahasiswa --}}
                    <a href="{{ route('admin.mahasiswa.create') }}"
                       class="group flex flex-col items-center justify-center p-3 bg-gradient-to-br from-dark-blue-50 to-dark-blue-100 rounded-lg border border-dark-blue-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 h-full">
                        <div class="w-8 h-8 bg-red-accent-500 rounded-md flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Tambah Mahasiswa</span>
                    </a>

                    {{-- Tambah Dosen --}}
                    <a href="#"
                       class="group flex flex-col items-center justify-center p-3 bg-gradient-to-br from-dark-blue-50 to-dark-blue-100 rounded-lg border border-dark-blue-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 h-full">
                        <div class="w-8 h-8 bg-red-accent-500 rounded-md flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Tambah Dosen</span>
                    </a>

                    {{-- Kelola Akun --}}
                    <a href="{{ route('admin.mahasiswa.index') }}"
                       class="group flex flex-col items-center justify-center p-3 bg-gradient-to-br from-dark-blue-50 to-dark-blue-100 rounded-lg border border-dark-blue-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 h-full">
                        <div class="w-8 h-8 bg-red-accent-600 rounded-md flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Kelola Akun</span>
                    </a>

                    {{-- Data Mahasiswa --}}
                    <a href="{{ route('admin.mahasiswa.index') }}"
                       class="group flex flex-col items-center justify-center p-3 bg-gradient-to-br from-dark-blue-50 to-dark-blue-100 rounded-lg border border-dark-blue-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 h-full">
                        <div class="w-8 h-8 bg-red-accent-600 rounded-md flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Data Mahasiswa</span>
                    </a>

                    {{-- Laporan --}}
                    <a href="#"
                       class="group flex flex-col items-center justify-center p-3 bg-gradient-to-br from-dark-blue-50 to-dark-blue-100 rounded-lg border border-dark-blue-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 h-full">
                        <div class="w-8 h-8 bg-red-accent-600 rounded-md flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Laporan</span>
                    </a>

                    {{-- Pengaturan --}}
                    <a href="#"
                       class="group flex flex-col items-center justify-center p-3 bg-gradient-to-br from-dark-blue-50 to-dark-blue-100 rounded-lg border border-dark-blue-100 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 h-full">
                        <div class="w-8 h-8 bg-red-accent-700 rounded-md flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Pengaturan</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- University Info --}}
        {{-- Menambahkan flex flex-col dan h-full untuk membuat kolom ini sejajar tingginya --}}
        <div class="space-y-4 flex flex-col h-full">
            {{-- Visi --}}
            {{-- Menambahkan flex-1 agar blok ini membagi ruang vertikal --}}
            <div class="bg-dark-blue-300 rounded-xl shadow-sm border border-dark-blue-100 p-4 flex-1">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-7 h-7 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-md flex items-center justify-center">
                        <span class="text-white text-xs">🎯</span>
                    </div>
                    <h3 class="text-base font-bold text-gray-800">Visi UNTAD</h3>
                </div>
                <div class="bg-gradient-to-r from-dark-blue-50 to-gray-50 rounded-lg p-3 border-l-4 border-dark-blue-500">
                    <p class="text-xs text-gray-700 leading-relaxed">
                        "Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup."
                    </p>
                </div>
            </div>

            {{-- Recent Activity --}}
            {{-- Menambahkan flex-1 agar blok ini membagi ruang vertikal --}}
            <div class="bg-dark-blue-200 rounded-xl shadow-sm border border-dark-blue-100 p-4 flex-1">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-7 h-7 bg-gradient-to-br from-red-accent-400 to-red-accent-500 rounded-md flex items-center justify-center shadow-lg">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-800">Aktivitas Terbaru</h3>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-md">
                        <div class="w-2 h-2 bg-dark-blue-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-700">Mahasiswa baru terdaftar</p>
                            <p class="text-xxs text-gray-500">2 menit yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-md">
                        <div class="w-2 h-2 bg-red-accent-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-700">Data dosen diperbarui</p>
                            <p class="text-xxs text-gray-500">15 menit yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 p-2 bg-gray-50 rounded-md">
                        <div class="w-2 h-2 bg-dark-blue-600 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-xs text-gray-700">Laporan bulanan dibuat</p>
                            <p class="text-xxs text-gray-500">1 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-4">
        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white rounded-full shadow-sm border border-dark-blue-100">
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