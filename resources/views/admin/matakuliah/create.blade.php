@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto px-6 py-8 bg-white shadow rounded-xl">
    <h1 class="text-3xl font-bold mb-6 text-center text-red-700">Tambah Matakuliah</h1>

    @if ($errors->any())
        <div class="mb-8 max-w-lg mx-auto p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg shadow">
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
            <label for="kode" class="block mb-2 font-semibold text-gray-700">Kode</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode') }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label for="sks" class="block mb-2 font-semibold text-gray-700">SKS</label>
            <input type="number" name="sks" id="sks" value="{{ old('sks') }}" required min="0"
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label for="jurusan" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div class="flex justify-between items-center pt-4">
            <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                Simpan
            </button>
            <a href="{{ route('admin.matakuliah.index') }}" 
               class="text-gray-600 hover:underline font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
