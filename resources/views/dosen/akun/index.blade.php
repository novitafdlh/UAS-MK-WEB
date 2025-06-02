@extends('layouts.dosen')

@section('title', 'Profil Dosen')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Page Header (Banner Section) --}}
    <div class="relative bg-gradient-to-r from-dark-blue-600 to-red-accent-600 h-32 md:h-48 rounded-2xl shadow-lg mb-8 flex items-center justify-center overflow-hidden">
        <img src="{{ asset('img/untad-campus-banner.jpg') }}" alt="UNTAD Campus" class="absolute inset-0 w-full h-full object-cover opacity-70">
        <h2 class="relative z-10 text-3xl md:text-5xl font-extrabold text-white text-center drop-shadow-md">
            Profil Dosen
        </h2>
    </div>

    <div class="max-w-4xl mx-auto -mt-16 md:-mt-24 relative z-20">
        {{-- Profile Card (Biodata) --}}
        <div class="bg-white rounded-2xl shadow-xl border border-dark-blue-100 p-6 md:p-8 mb-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                {{-- Profile Avatar --}}
                <div class="w-20 h-20 md:w-24 md:h-24 bg-gradient-to-br from-dark-blue-400 to-red-accent-500 rounded-full flex items-center justify-center text-white font-bold text-3xl shadow-lg ring-4 ring-dark-blue-50 ring-offset-2">
                    {{ substr($dosen->name ?? 'DS', 0, 2) }}
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium uppercase tracking-wider">Dosen Pengampu</p>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">{{ $dosen->name }}</h3>
                    <p class="text-base text-gray-600">NIDN: {{ $dosen->nidn }}</p>
                </div>
            </div>
            <div class="text-center md:text-right">
                <a href="{{ route('dosen.akun.edit') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Profil
                </a>
            </div>
        </div>

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-dark-blue-50 to-dark-blue-100 border border-dark-blue-200 rounded-xl shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-dark-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-dark-blue-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Details Section --}}
        <div class="bg-white rounded-2xl shadow-md border border-dark-blue-100 p-6 md:p-8">
            <h3 class="text-xl md:text-2xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-6 text-center">
                Detail Informasi Akun
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-center p-4 bg-dark-blue-50 rounded-xl border border-dark-blue-100 shadow-sm">
                    <div class="flex-shrink-0 w-10 h-10 bg-dark-blue-200 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-dark-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h10a2 2 0 002-2v-5m-7-6l2-2m0 0l2 2m-2-2v7.5"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">NIDN</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $dosen->nidn }}</p>
                    </div>
                </div>

                <div class="flex items-center p-4 bg-red-accent-50 rounded-xl border border-red-accent-100 shadow-sm">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-accent-200 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-red-accent-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $dosen->name }}</p>
                    </div>
                </div>

                <div class="flex items-center p-4 bg-dark-blue-50 rounded-xl border border-dark-blue-100 shadow-sm">
                    <div class="flex-shrink-0 w-10 h-10 bg-dark-blue-200 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-dark-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="text-lg font-semibold text-gray-800">{{ $dosen->email }}</p>
                    </div>
                </div>

                <div class="flex items-center p-4 bg-red-accent-50 rounded-xl border border-red-accent-100 shadow-sm">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-accent-200 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-red-accent-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jurusan</p>
                        <p class="text-lg font-semibold text-gray-800">{{ optional($dosen->jurusan)->nama ?? '-' }}</p>
                    </div>
                </div>

                <div class="flex items-center p-4 bg-dark-blue-50 rounded-xl border border-dark-blue-100 shadow-sm">
                    <div class="flex-shrink-0 w-10 h-10 bg-dark-blue-200 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-dark-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Program Studi</p>
                        <p class="text-lg font-semibold text-gray-800">{{ optional($dosen->prodi)->nama ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection