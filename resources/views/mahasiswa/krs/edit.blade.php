@extends('layouts.mahasiswa')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit KRS</h2>

<form action="{{ route('mahasiswa.krs.update', $krs) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="mata_kuliah_id" class="block mb-2 font-semibold">Pilih Mata Kuliah</label>
    <select name="mata_kuliah_id" id="mata_kuliah_id" class="border rounded px-3 py-2 w-full">
        @foreach ($mataKuliahs as $mk)
            <option value="{{ $mk->id }}" {{ $mk->id == $krs->mata_kuliah_id ? 'selected' : '' }}>
                {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS)
            </option>
        @endforeach
    </select>

    <button type="submit" class="mt-4 bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">
        Update KRS
    </button>
</form>

<a href="{{ route('mahasiswa.krs.index') }}" class="inline-block mt-4 text-teal-600 hover:underline">
    &larr; Kembali ke daftar KRS
</a>
@endsection
