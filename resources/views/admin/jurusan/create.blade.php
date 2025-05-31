@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-red-100 p-6 flex flex-col">

    {{-- Header di pojok kiri atas, di luar kotak putih --}}
    <header class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
            Tambah Jurusan
        </h1>
        <p class="text-black-600">Tambahkan data jurusan baru ke sistem</p>
    </header>

    {{-- Kotak form --}}
    <div class="max-w-3xl w-full bg-white rounded-xl shadow-md border border-rose-300 p-8 self-center">
        {{-- Tombol kembali bisa di sini atau di header --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.jurusan.index') }}"
               class="text-red-600 hover:underline font-semibold">
                &larr; Kembali ke Daftar Jurusan
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-red-100 text-red-700 p-4 rounded shadow border border-red-300">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.jurusan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Jurusan</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.jurusan.index') }}"
                   class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 font-semibold">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-red-700 text-white rounded hover:bg-red-800 font-semibold shadow transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
