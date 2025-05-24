@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Edit Prodi</h2>

    <form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block mb-1 font-medium">Nama Prodi</label>
            <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2"
                   value="{{ old('nama', $prodi->nama) }}" required>
        </div>

        <div class="mb-4">
            <label for="jurusan_id" class="block mb-1 font-medium">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusan as $jrs)
                    <option value="{{ $jrs->id }}" {{ (old('jurusan_id', $prodi->jurusan_id) == $jrs->id) ? 'selected' : '' }}>
                        {{ $jrs->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.prodi.index') }}" class="px-4 py-2 bg-gray-300 rounded mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </div>
    </form>
</div>
@endsection
