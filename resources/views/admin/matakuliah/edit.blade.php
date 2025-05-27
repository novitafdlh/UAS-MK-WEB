@extends('layouts.admin')

@section('content')


    <form action="{{ route('admin.matakuliah.update', $matakuliah->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="kode" class="block mb-2 font-semibold text-gray-700">Kode</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode', $matakuliah->kode) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $matakuliah->nama) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div>
            <label for="sks" class="block mb-2 font-semibold text-gray-700">SKS</label>
            <input type="number" name="sks" id="sks" value="{{ old('sks', $matakuliah->sks) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div>
            <label for="jurusan" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $matakuliah->jurusan) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200 ">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
