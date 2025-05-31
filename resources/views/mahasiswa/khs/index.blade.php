@extends('layouts.mahasiswa')

@section('title', 'Kartu Hasil Studi (KHS)')

@section('content')
<main class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-bold text-rose-600 mb-6 text-center">Kartu Hasil Studi (KHS)</h2>

        {{-- Biodata Mahasiswa --}}
        <div class="bg-rose-50 border border-rose-100 p-4 rounded-lg mb-6">
            <p class="text-base text-gray-800"><strong>Nama:</strong> {{ $mahasiswa->name }}</p>
            <p class="text-base text-gray-800"><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
        </div>

        {{-- Tabel Nilai --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 divide-y divide-gray-100">
                <thead class="bg-rose-100 text-rose-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Dosen</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nilai</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100 text-gray-700">
                    @forelse($nilais as $nilai)
                        <tr>
                            <td class="px-6 py-4">{{ $nilai->mataKuliah->nama ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $nilai->dosen->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $nilai->nilai ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center px-6 py-4 text-gray-500">Belum ada nilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
