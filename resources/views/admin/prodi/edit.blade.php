@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-6">
    <h1 class="text-2xl font-semibold mb-4">Edit Program Studi</h1>

    <form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="jurusan_id" class="block font-medium mb-1">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusans as $item)
                    <option value="{{ $item->id }}" {{ $prodi->jurusan_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nama" class="block font-medium mb-1">Nama Prodi</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $prodi->nama) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.prodi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
