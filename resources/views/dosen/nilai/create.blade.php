@extends('layouts.dosen')
@section('title', 'Input Nilai Mahasiswa')
@section('content')

<h2 class="text-xl font-bold mb-4">Input Nilai</h2>

{{-- Form Filter (GET) --}}
<form method="GET" action="{{ route('dosen.nilai.create') }}" class="space-y-4 mb-6">
    {{-- Pilih Prodi --}}
    <div>
        <label for="prodi_id" class="block font-medium">Pilih Prodi</label>
        <select name="prodi_id" id="prodi_id" class="border p-2 rounded w-full" onchange="this.form.submit()">
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ $selectedProdiId == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Pilih Mata Kuliah --}}
    @if($selectedProdiId)
    <div>
        <label for="mata_kuliah_id" class="block font-medium">Pilih Mata Kuliah</label>
        <select name="mata_kuliah_id" id="mata_kuliah_id" class="border p-2 rounded w-full" onchange="this.form.submit()">
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach($mataKuliahs as $mk)
                <option value="{{ $mk->id }}" {{ $selectedMataKuliahId == $mk->id ? 'selected' : '' }}>
                    {{ $mk->nama }}
                </option>
            @endforeach
        </select>
    </div>
    @endif

    {{-- Pilih Mahasiswa --}}
    @if($selectedMataKuliahId)
    <div>
        <label for="mahasiswa_id" class="block font-medium">Pilih Mahasiswa</label>
        <select name="mahasiswa_id" id="mahasiswa_id" class="border p-2 rounded w-full" onchange="this.form.submit()">
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach($mahasiswas as $mhs)
                <option value="{{ $mhs->id }}"
                    {{ $selectedMahasiswaId == $mhs->id ? 'selected' : '' }}>
                    {{ $mhs->nama }}
                </option>
            @endforeach
        </select>
    </div>
    @endif
</form>

{{-- Form Input Nilai (POST) --}}
@if($selectedMahasiswaId && $selectedMataKuliahId)
<form method="POST" action="{{ route('dosen.nilai.store') }}" class="space-y-4 max-w-md">
    @csrf
    <input type="hidden" name="mata_kuliah_id" value="{{ $selectedMataKuliahId }}">
    <input type="hidden" name="mahasiswa_id" value="{{ $selectedMahasiswaId }}"> {{-- Ini user_id dari tabel users --}}

    <div>
        <label class="block font-medium mb-1">Nilai untuk:</label>
        <div class="mb-2">
            @php
                $selectedMhs = $mahasiswas->firstWhere('id', $selectedMahasiswaId);
            @endphp
            <strong>Mahasiswa:</strong> {{ $selectedMhs->nama ?? '-' }}
        </div>
        <div>
            <strong>Mata Kuliah:</strong> {{ $mataKuliahs->firstWhere('id', $selectedMataKuliahId)->nama ?? '-' }}
        </div>
    </div>

    <div>
        <label for="nilai" class="block font-medium">Nilai</label>
        <input type="text" name="nilai" id="nilai" class="border p-2 rounded w-full" placeholder="Masukkan nilai (misal: A, B, C...)" required>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Simpan Nilai
    </button>
</form>
@endif

@endsection
