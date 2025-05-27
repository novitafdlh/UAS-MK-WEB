@extends('layouts.dosen')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Edit Nilai Mahasiswa</h2>
    <form action="{{ route('dosen.nilai.update', $nilai->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Nama Mahasiswa</label>
            <input type="text" value="{{ $nilai->mahasiswa->nama }}" class="w-full px-4 py-2 border rounded-lg bg-gray-100" readonly>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">Mata Kuliah</label>
            <input type="text" value="{{ $nilai->matakuliah->nama }}" class="w-full px-4 py-2 border rounded-lg bg-gray-100" readonly>
        </div>

        <div>
            <label for="nilai" class="block mb-2 font-semibold text-gray-700">Nilai</label>
            <input type="number" name="nilai" id="nilai" value="{{ old('nilai', $nilai->nilai) }}" min="0" max="100" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @error('nilai')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end gap-4 pt-4">
            <a href="{{ route('dosen.nilai.index') }}" class="px-6 py-2 text-gray-600 font-semibold rounded-lg hover:underline">
                Batal
            </a>
            <form action="{{ route('dosen.nilai.destroy', $nilai->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus nilai ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                    Hapus
                </button>
            </form>
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection