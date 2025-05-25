@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-6">
    <h1 class="text-2xl font-semibold mb-4">Tambah Program Studi</h1>

    <form action="{{ route('admin.prodi.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="jurusan_id" class="block font-medium mb-1">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="nama" class="block font-medium mb-1">Nama Prodi</label>
            <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
