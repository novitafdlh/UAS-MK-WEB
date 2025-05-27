@extends('layouts.admin')

@section('title', 'Tambah Matakuliah')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-red-300 via-rose-300 to-red-300 min-h-screen">
    {{-- Header --}}
    <header class="bg-white rounded-2xl shadow-sm border border-rose-100 p-6 mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <img src="{{ asset('img/untad-new.jpeg') }}" 
                         alt="Logo Untad" 
                         class="w-14 h-14 object-contain rounded-xl shadow-md ring-2 ring-rose-200" />
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-red-600 to-rose-600 bg-clip-text text-transparent">
                        Tambah Matakuliah
                    </h1>
                    <p class="text-sm text-rose-500 font-medium">Masukkan data matakuliah baru</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.matakuliah.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-500 via-rose-500 to-red-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-pink-600 hover:to-red-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    Kembali ke Daftar Matakuliah
                </a>
            </div>
        </div>
    </header>

    {{-- Form Container --}}
    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 max-w-lg mx-auto p-8">
        
        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.matakuliah.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="kode" class="block mb-2 font-semibold text-gray-700">Kode Matakuliah</label>
                <input type="text" name="kode" id="kode" value="{{ old('kode') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" 
                    placeholder="Contoh: IF101" />
            </div>

            <div>
                <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Matakuliah</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" 
                    placeholder="Contoh: Pemrograman Dasar" />
            </div>

            <div>
                <label for="sks" class="block mb-2 font-semibold text-gray-700">SKS</label>
                <input type="number" name="sks" id="sks" value="{{ old('sks') }}" required min="0"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" 
                    placeholder="Jumlah SKS" />
            </div>

            <div>
                <label for="jurusan" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" 
                    placeholder="Contoh: Teknik Informatika" />
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.matakuliah.index') }}" 
                   class="px-6 py-3 text-gray-600 font-semibold rounded-lg hover:underline">
                    Batal
                </a>
                <button type="submit" 
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-6 mt-12">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-sm border border-rose-100">
            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <span class="text-sm text-gray-600">&copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.</span>
        </div>
    </footer>
</main>
@endsection
