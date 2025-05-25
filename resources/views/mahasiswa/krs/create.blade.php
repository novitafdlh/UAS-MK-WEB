@extends('layouts.mahasiswa')

@section('content')
<h2 class="text-xl font-bold mb-4">Tambah KRS</h2>

{{-- Form pilih Prodi --}}
<form action="{{ route('mahasiswa.krs.create') }}" method="GET" class="mb-6">
    <label for="prodi_id" class="block font-semibold mb-1">Pilih Prodi</label>
    <select name="prodi_id" id="prodi_id" class="border p-2 rounded w-full" required>
        <option value="">-- Pilih Prodi --</option>
        @foreach($prodis as $prodi)
            <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                {{ $prodi->nama }}
            </option>
        @endforeach
    </select>
    <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Tampilkan Mata Kuliah
    </button>
</form>

{{-- Jika sudah pilih Prodi, tampilkan form KRS --}}
@if(request('prodi_id'))
    <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
        @csrf

        <input type="hidden" name="prodi_id" value="{{ request('prodi_id') }}">

        <div class="mb-3">
            <label for="mata_kuliah_id" class="block font-semibold mb-1">Pilih Mata Kuliah</label>
            <select name="mata_kuliah_id" id="mata_kuliah_id" class="border p-2 rounded w-full" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                        {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS)
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan KRS
        </button>
    </form>
@endif
@endsection
