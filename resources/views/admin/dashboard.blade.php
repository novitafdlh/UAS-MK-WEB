@extends('layouts.admin')

@section('title', 'Dashboard Admin')

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
                    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent">
                        Universitas Tadulako
                    </h1>
                    <p class="text-sm text-rose-500 font-medium">Sistem Informasi Akademik - Admin Panel</p>
                </div>
            </div>
            <div class="text-center md:text-right">
                <p class="text-gray-600 text-sm">Selamat datang,</p>
                <p class="font-bold text-rose-700 text-lg">{{ auth()->user()->name }}</p>
                <span class="inline-block px-3 py-1 bg-rose-100 text-rose-700 text-xs rounded-full font-medium mt-1">
                    Administrator
                </span>
            </div>
        </div>
    </header>

    {{-- Page Title --}}
    <div class="text-center mb-8">
        <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent mb-2">
            Dashboard Administrator
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 mx-auto rounded-full"></div>
    </div>

    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Card 1: Mahasiswa --}}
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-rose-400 to-rose-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Mahasiswa</h3>
            <p class="text-3xl font-bold text-rose-600 mb-1">37,964</p>
            <p class="text-sm text-gray-500">Mahasiswa aktif</p>
        </div>

        {{-- Card 2: Dosen --}}
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-red-400 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Dosen</h3>
            <p class="text-3xl font-bold text-red-600 mb-1">1,139</p>
            <p class="text-sm text-gray-500">Dosen aktif</p>
        </div>

        {{-- Card 3: Program Studi --}}
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-rose-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Program Studi</h3>
            <p class="text-3xl font-bold text-rose-700 mb-1">51</p>
            <p class="text-sm text-gray-500">Program aktif</p>
        </div>

        {{-- Card 4: Fakultas --}}
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Fakultas</h3>
            <p class="text-3xl font-bold text-red-700 mb-1">12</p>
            <p class="text-sm text-gray-500">Fakultas aktif</p>
        </div>
    </div>

    {{-- Quick Actions & Info Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        {{-- Quick Actions --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-rose-100 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-gradient-to-br from-rose-400 to-rose-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Aksi Cepat</h3>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    {{-- Tambah Mahasiswa --}}
                    <a href="{{ route('admin.mahasiswa.data.create') }}" 
                       class="group flex flex-col items-center p-4 bg-gradient-to-br from-rose-50 to-red-50 rounded-xl border border-rose-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                        <div class="w-10 h-10 bg-rose-500 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Tambah Mahasiswa</span>
                    </a>

                    {{-- Tambah Dosen --}}
                    <a href="#" 
                       class="group flex flex-col items-center p-4 bg-gradient-to-br from-red-50 to-rose-50 rounded-xl border border-red-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                        <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Tambah Dosen</span>
                    </a>

                    {{-- Kelola Akun --}}
                    <a href="{{ route('admin.mahasiswa.akun.index') }}" 
                       class="group flex flex-col items-center p-4 bg-gradient-to-br from-rose-50 to-red-50 rounded-xl border border-rose-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                        <div class="w-10 h-10 bg-rose-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Kelola Akun</span>
                    </a>

                    {{-- Data Mahasiswa --}}
                    <a href="{{ route('admin.mahasiswa.data.index') }}" 
                       class="group flex flex-col items-center p-4 bg-gradient-to-br from-red-50 to-rose-50 rounded-xl border border-red-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                        <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Data Mahasiswa</span>
                    </a>

                    {{-- Laporan --}}
                    <a href="#" 
                       class="group flex flex-col items-center p-4 bg-gradient-to-br from-rose-50 to-red-50 rounded-xl border border-rose-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                        <div class="w-10 h-10 bg-rose-700 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Laporan</span>
                    </a>

                    {{-- Pengaturan --}}
                    <a href="#" 
                       class="group flex flex-col items-center p-4 bg-gradient-to-br from-red-50 to-rose-50 rounded-xl border border-red-100 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                        <div class="w-10 h-10 bg-red-700 rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Pengaturan</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- University Info --}}
        <div class="space-y-6">
            {{-- Visi --}}
            <div class="bg-white rounded-2xl shadow-sm border border-rose-100 p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-br from-rose-400 to-rose-500 rounded-lg flex items-center justify-center">
                        <span class="text-white text-sm">🎯</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Visi UNTAD</h3>
                </div>
                <div class="bg-gradient-to-r from-rose-50 to-red-50 rounded-lg p-4 border-l-4 border-rose-500">
                    <p class="text-sm text-gray-700 leading-relaxed">
                        "Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup."
                    </p>
                </div>
            </div>

            {{-- Recent Activity --}}
            <div class="bg-white rounded-2xl shadow-sm border border-rose-100 p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-br from-red-400 to-red-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Aktivitas Terbaru</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">Mahasiswa baru terdaftar</p>
                            <p class="text-xs text-gray-500">2 menit yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">Data dosen diperbarui</p>
                            <p class="text-xs text-gray-500">15 menit yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-2 h-2 bg-rose-600 rounded-full"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">Laporan bulanan dibuat</p>
                            <p class="text-xs text-gray-500">1 jam yang lalu</p>
                        </div>
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
