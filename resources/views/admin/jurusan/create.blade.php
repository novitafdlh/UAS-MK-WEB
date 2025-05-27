@extends('layouts.admin')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-white to-white min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
                    Tambah Jurusan
                </h1>
                <p class="text-black-600">Tambahkan data jurusan baru ke sistem</p>
            </div>
            
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

    {{-- Error Alert --}}
    @if ($errors->any())
        <div class="mb-6 max-w-xl mx-auto p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg shadow">
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Box --}}
    <section class="max-w-xl mx-auto bg-white p-6 md:p-8 rounded-2xl shadow border border-rose-100">
        <h1 class="text-3xl font-bold mb-8 text-center text-red-700">Tambah Jurusan </h1>
        <form action="{{ route('admin.jurusan.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Nama Jurusan --}}
            <div>
                <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Jurusan</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-400 focus:outline-none">
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end items-center gap-4 pt-4">
                <a href="{{ route('admin.jurusan.index') }}"
                   class="text-gray-600 hover:text-red-700 font-medium transition duration-150">
                    Batal
                </a>
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </section>
</main>
@endsection
