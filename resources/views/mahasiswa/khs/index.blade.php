@extends('layouts.mahasiswa')

@section('title', 'Kartu Hasil Studi (KHS)')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-2xl p-8 border border-dark-blue-100">
        <h2 class="text-3xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-6 text-center">
            Kartu Hasil Studi (KHS)
        </h2>

        {{-- Biodata Mahasiswa --}}
        <div class="bg-dark-blue-50 border border-dark-blue-100 p-4 rounded-xl mb-6">
            <p class="text-base text-gray-800 mb-1"><strong>Nama:</strong> {{ $mahasiswa->name }}</p>
            <p class="text-base text-gray-800"><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
        </div>

        {{-- Tabel Nilai --}}
        <div class="overflow-x-auto rounded-xl border border-dark-blue-100">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-dark-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-dark-blue-700 uppercase tracking-wider">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-dark-blue-700 uppercase tracking-wider">Dosen</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-dark-blue-700 uppercase tracking-wider">Nilai</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100 text-gray-700">
                    @forelse($nilais as $nilai)
                        <tr class="hover:bg-dark-blue-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->mataKuliah->nama ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $nilai->jadwal->dosen->name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-dark-blue-700">{{ $nilai->nilai ?? '-' }}</td>
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