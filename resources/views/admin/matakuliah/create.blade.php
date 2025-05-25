@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto px-6 py-8 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Matakuliah</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded shadow">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.matakuliah.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="kode" class="block font-semibold mb-1 text-gray-700">Kode</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode') }}"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="nama" class="block font-semibold mb-1 text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="sks" class="block font-semibold mb-1 text-gray-700">SKS</label>
            <input type="number" name="sks" id="sks" value="{{ old('sks') }}"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="jurusan" class="block font-semibold mb-1 text-gray-700">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
