@extends('layouts.mahasiswa')

@section('title', 'Dashboard')

@section('content')
<main class="flex-1 p-6 bg-gray-50 min-h-screen">
    {{-- Header --}}
    <header class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad" class="w-12 h-12 object-contain" />
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Universitas Tadulako</h1>
                <p class="text-sm text-gray-500">Sistem Informasi Akademik Mahasiswa</p>
            </div>
        </div>
        <div class="text-right text-gray-600">
            <p>Halo, <span class="font-semibold text-indigo-600">{{ auth()->user()->name }}</span></p>
        </div>
    </header>

    {{-- Page Title --}}
    <h2 class="text-2xl font-bold text-red-700 mb-6 text-center md:text-left">Dashboard Mahasiswa</h2>

    {{-- Statistik Box --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <div class="bg-indigo-100 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-indigo-700">Jumlah Mahasiswa</h3>
            <p class="text-3xl font-bold text-indigo-900 mt-2">37,964</p>
        </div>
        <div class="bg-green-100 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-green-700">Jumlah Program Studi</h3>
            <p class="text-3xl font-bold text-green-900 mt-2">51</p>
        </div>
        <div class="bg-yellow-100 p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold text-yellow-700">Jumlah Dosen</h3>
            <p class="text-3xl font-bold text-yellow-900 mt-2">1,139</p>
        </div>
    </div>

    {{-- Visi & Misi UNTAD --}}
    <div class="bg-red-800 text-white rounded-xl p-6 shadow-md mb-12">
        <h2 class="text-2xl font-bold mb-6 text-center">Visi & Misi Universitas Tadulako</h2>

        {{-- Visi --}}
        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-2">🎯 Visi</h3>
            <blockquote class="italic border-l-4 border-white pl-4">
                “Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup.”
            </blockquote>
        </div>

        {{-- Misi --}}
        <div>
            <h3 class="text-xl font-semibold mb-3">📌 Misi</h3>
            <ol class="list-decimal list-inside space-y-2 pl-4">
                <li>Menyelenggarakan pendidikan yang bermutu, modern, dan relevan menuju pencapaian standar internasional dalam pengembangan IPTEKS berwawasan lingkungan hidup.</li>
                <li>Menyelenggarakan penelitian yang bermutu untuk pengembangan IPTEKS berwawasan lingkungan hidup.</li>
                <li>Menyelenggarakan pengabdian kepada masyarakat sebagai pemanfaatan hasil pendidikan dan hasil penelitian yang dibutuhkan dalam pembangunan masyarakat.</li>
                <li>Menyelenggarakan reformasi birokrasi dan kerjasama regional, nasional dan internasional.</li>
            </ol>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.
    </footer>
</main>
@endsection
