@extends('layouts.mahasiswa')

@section('title', 'Profil Mahasiswa')

@section('content')
<main class="flex-1 p-3 md:p-4 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Page Header (Banner Section) --}}
    <div class="relative bg-gradient-to-r from-dark-blue-600 to-red-accent-600 h-24 md:h-32 rounded-xl shadow-md mb-6 flex items-center justify-center overflow-hidden">
        <h2 class="relative z-10 text-2xl md:text-4xl font-extrabold text-white text-center drop-shadow">
            Profil Mahasiswa
        </h2>
    </div>

    <div class="max-w-4xl mx-auto -mt-12 md:-mt-16 relative z-20">
        {{-- Profile Card (Biodata) --}}
        <div class="bg-white rounded-xl shadow-lg border border-dark-blue-100 p-4 md:p-6 mb-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                {{-- Profile Avatar --}}
                <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-dark-blue-400 to-red-accent-500 rounded-full flex items-center justify-center text-white font-bold text-2xl shadow-md ring-2 ring-dark-blue-50 ring-offset-1">
                    {{ substr($mahasiswa->name ?? 'MH', 0, 2) }}
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">Mahasiswa</p>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-0.5">{{ $mahasiswa->name }}</h3>
                    <p class="text-sm text-gray-600">NIM: {{ $mahasiswa->nim }}</p>
                </div>
            </div>
            <div class="text-center md:text-right">
                <a href="{{ route('mahasiswa.akun.edit') }}"
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-lg shadow-md hover:shadow-lg hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200 text-sm">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Profil
                </a>
            </div>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="mb-5 p-3 bg-gradient-to-r from-dark-blue-50 to-dark-blue-100 border border-dark-blue-200 rounded-lg shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-4 h-4 text-dark-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-2">
                        <p class="text-dark-blue-800 font-medium text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Details Section --}}
        <div class="bg-white rounded-xl shadow-md border border-dark-blue-100 p-4 md:p-6">
            <h3 class="text-lg md:text-xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-5 text-center">
                Detail Informasi Akun
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-center p-3 bg-dark-blue-50 rounded-lg border border-dark-blue-100 shadow-sm">
                    <div class="flex-shrink-0 w-8 h-8 bg-dark-blue-200 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-dark-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h10a2 2 0 002-2v-5m-7-6l2-2m0 0l2 2m-2-2v7.5"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">NIM</p>
                        <p class="text-base font-semibold text-gray-800">{{ $mahasiswa->nim }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-red-accent-50 rounded-lg border border-red-accent-100 shadow-sm">
                    <div class="flex-shrink-0 w-8 h-8 bg-red-accent-200 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-red-accent-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Nama Lengkap</p>
                        <p class="text-base font-semibold text-gray-800">{{ $mahasiswa->name }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-dark-blue-50 rounded-lg border border-dark-blue-100 shadow-sm">
                    <div class="flex-shrink-0 w-8 h-8 bg-dark-blue-200 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-dark-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Email</p>
                        <p class="text-base font-semibold text-gray-800">{{ $mahasiswa->email }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-red-accent-50 rounded-lg border border-red-accent-100 shadow-sm">
                    <div class="flex-shrink-0 w-8 h-8 bg-red-accent-200 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-red-accent-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Jurusan</p>
                        <p class="text-base font-semibold text-gray-800">{{ optional($mahasiswa->jurusan)->nama ?? '-' }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-dark-blue-50 rounded-lg border border-dark-blue-100 shadow-sm">
                    <div class="flex-shrink-0 w-8 h-8 bg-dark-blue-200 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-dark-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Program Studi</p>
                        <p class="text-base font-semibold text-gray-800">{{ optional($mahasiswa->prodi)->nama ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection