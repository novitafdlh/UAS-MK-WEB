@extends('layouts.admin')

@section('content')


<div class="max-w-lg mx-auto mt-6 bg-red-300 p-8 rounded-xl shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-center text-black">Edit Program Studi</h1>

    <form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusans as $item)
                    <option value="{{ $item->id }}" {{ $prodi->jurusan_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Prodi</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $prodi->nama) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.prodi.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                Kembali
            </a>
            <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
