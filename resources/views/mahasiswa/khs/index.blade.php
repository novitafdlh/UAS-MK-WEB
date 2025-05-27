@extends('layouts.mahasiswa')

@section('title', 'Kartu Hasil Studi (KHS)')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Kartu Hasil Studi (KHS)</h2>
    <div class="mb-4">
        <strong>Nama:</strong> {{ $mahasiswa->nama }}<br>
        <strong>NIM:</strong> {{ $mahasiswa->nim }}
    </div>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2">Mata Kuliah</th>
                <th class="px-4 py-2">Dosen</th>
                <th class="px-4 py-2">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nilais as $nilai)
            <tr>
                <td class="px-4 py-2">{{ $nilai->mataKuliah->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $nilai->dosen->nama ?? '-' }}</td>
                <td class="px-4 py-2">{{ $nilai->nilai ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4">Belum ada nilai.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection