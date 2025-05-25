@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto px-4 py-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Matakuliah</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded shadow">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.matakuliah.update', $matakuliah->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="kode" class="block font-semibold text-gray-700 mb-1">Kode</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode', $matakuliah->kode) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="nama" class="block font-semibold text-gray-700 mb-1">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $matakuliah->nama) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="sks" class="block font-semibold text-gray-700 mb-1">SKS</label>
            <input type="number" name="sks" id="sks" value="{{ old('sks', $matakuliah->sks) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label for="jurusan" class="block font-semibold text-gray-700 mb-1">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $matakuliah->jurusan) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
