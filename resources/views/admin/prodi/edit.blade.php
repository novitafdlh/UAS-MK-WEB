@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-red-100 p-6 flex justify-center items-center">
    <div class="max-w-3xl w-full bg-white rounded-xl shadow-md border border-rose-300 p-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-red-700">Edit Program Studi</h1>

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

            <div class="flex justify-end space-x-4 pt-4">
                <a href="{{ route('admin.prodi.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                    Kembali
                </a>
                <button type="submit"
                        class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
