@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        {{-- Header Universitas --}}
            <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad" class="w-10 h-auto">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Universitas Tadulako</h1>
                    <p class="text-sm text-gray-500">Sistem Informasi Akademik</p>
                </div>
            </div>

            <div class="text-right">
                <p class="flex items-center text-gray-600">
                    Halo, 
                    <span class="font-semibold text-indigo-600 ml-2">{{ auth()->user()->name }}</span>
                </p>
            </div>
        </div> {{-- Tutup flex items-center justify-between --}}

        {{-- Kotak Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-indigo-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-indigo-700">Jumlah Mahasiswa</h2>
                <p class="text-4xl font-bold text-indigo-900 mt-2">37964</p>
            </div>

            <div class="bg-green-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-green-700">Jumlah Program Studi</h2>
                <p class="text-4xl font-bold text-green-900 mt-2">51</p>
            </div>

            <div class="bg-yellow-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                <h2 class="text-xl font-semibold text-yellow-700">Jumlah Dosen</h2>
                <p class="text-4xl font-bold text-yellow-900 mt-2">1139</p>
            </div>
        </div>

        {{-- Visi & Misi Untad --}}
        <div class="p-6 rounded-xl shadow-md bg-red-800 text-white">
            <h2 class="text-2xl font-bold mb-4 text-center">Visi Universitas Tadulako</h2>
            <p class="mb-6 leading-relaxed">
                “Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup.”
            </p>

            <h2 class="text-2xl font-bold mb-4 text-center">Misi Universitas Tadulako</h2>
            <ul class="list-disc list-inside space-y-2">
                <li>Menyelenggarakan pendidikan yang bermutu, modern, dan relevan menuju pencapaian standar internasional dalam pengembangan IPTEKS berwawasan lingkungan hidup.</li>
                <li>Menyelenggarakan penelitian yang bermutu untuk pengembangan IPTEKS berwawasan lingkungan hidup.</li>
                <li>Menyelenggarakan pengabdian kepada masyarakat sebagai pemanfaatan hasil pendidikan dan hasil penelitian yang di butuhkan dalam pembangunan masyarakat.</li>
                <li>Menyelenggarakan akan reformasi birokrasi dan kerjasama regional, nasional dan internasional.</li>
            </ul>
        </div>

        {{-- Footer --}}
        <div class="mt-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.</p>
        </div>
    </div>
@endsection
