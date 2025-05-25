@extends('layouts.dosen')

@section('content')
    <!-- Main Content -->
    <main class="flex-1 p-6 min-h-screen bg-gray-50">
        {{-- Header --}}
        <header class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Universitas Tadulako" class="w-12 h-auto" />
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Universitas Tadulako</h1>
                    <p class="text-sm text-gray-500">Sistem Informasi Akademik Dosen</p>
                </div>
            </div>
            <div class="text-gray-600">
                Halo, <span class="font-semibold text-indigo-600 ml-2">{{ auth()->user()->name }}</span>
            </div>
        </header>

        {{-- Page Title --}}
        <h2 class="text-xl font-semibold text-red-700 mb-6">Dashboard Dosen</h2>

        {{-- Statistik Box --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-indigo-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-indigo-700">Mahasiswa Bimbingan</h3>
                <p class="text-4xl font-bold text-indigo-900 mt-2">25</p>
            </div>

            <div class="bg-green-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-green-700">Jumlah Tugas</h3>
                <p class="text-4xl font-bold text-green-900 mt-2">12</p>
            </div>

            <div class="bg-yellow-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-yellow-700">Pertemuan Mingguan</h3>
                <p class="text-4xl font-bold text-yellow-900 mt-2">5</p>
            </div>
        </div>

        {{-- Visi & Misi UNTAD --}}
        <section class="bg-red-800 rounded-xl shadow-md p-6 mb-10 text-white">
            <h2 class="text-2xl font-bold mb-6 text-center">Visi & Misi Universitas Tadulako</h2>

            {{-- Visi --}}
            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-2 flex items-center gap-2">🎯 Visi</h3>
                <p class="italic border-l-4 border-white pl-4">
                    “Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup.”
                </p>
            </div>

            {{-- Misi --}}
            <div>
                <h3 class="text-xl font-semibold mb-4 flex items-center gap-2">📌 Misi</h3>
                <ol class="list-decimal list-inside space-y-3 pl-3">
                    <li>Menyelenggarakan pendidikan yang bermutu, modern, dan relevan menuju pencapaian standar internasional dalam pengembangan IPTEKS berwawasan lingkungan hidup.</li>
                    <li>Menyelenggarakan penelitian yang bermutu untuk pengembangan IPTEKS berwawasan lingkungan hidup.</li>
                    <li>Menyelenggarakan pengabdian kepada masyarakat sebagai pemanfaatan hasil pendidikan dan hasil penelitian yang dibutuhkan dalam pembangunan masyarakat.</li>
                    <li>Menyelenggarakan reformasi birokrasi dan kerjasama regional, nasional dan internasional.</li>
                </ol>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="text-center text-sm text-gray-500 mt-12">
            &copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.
        </footer>
    </main>
@endsection
