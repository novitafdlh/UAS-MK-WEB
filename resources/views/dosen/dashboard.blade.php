@extends('layouts.dosen')

@section('content')
    <div class="text-2xl font-semibold mb-6">Selamat Datang, {{ Auth::user()->name }}</div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <div class="text-lg font-medium">Jumlah Mahasiswa Bimbingan</div>
            <div class="text-3xl font-bold mt-2">{{ $jumlahMahasiswa ?? '-' }}</div>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <div class="text-lg font-medium">Jumlah Mata Kuliah</div>
            <div class="text-3xl font-bold mt-2">{{ $jumlahMataKuliah ?? '-' }}</div>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <div class="text-lg font-medium">KRS Disetujui</div>
            <div class="text-3xl font-bold mt-2">{{ $jumlahKRS ?? '-' }}</div>
        </div>
    </div>
@endsection
