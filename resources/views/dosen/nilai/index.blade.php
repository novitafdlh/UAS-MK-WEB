@extends('layouts.dosen')

@section('title', 'Nilai Mahasiswa')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-2">
                    Daftar Nilai Mahasiswa
                </h1>
                <p class="text-gray-600">Lihat dan kelola data nilai mahasiswa</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('dosen.nilai.create') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Input Nilai
                </a>
            </div>
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 rounded-full mt-4"></div>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-dark-blue-50 to-dark-blue-100 border border-dark-blue-200 rounded-xl shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-dark-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-dark-blue-800 font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    {{-- Filter Prodi --}}
    {{-- Removed the wrapping div for the filter to save space --}}
    <div class="mb-6"> {{-- Container for margin-bottom --}}
        <form method="GET" action="{{ route('dosen.nilai.index') }}" class="flex items-center gap-2">
            <label for="prodi_id" class="sr-only">Filter Program Studi</label> {{-- Visually hidden label --}}
            <div class="relative flex-grow max-w-xs"> {{-- Added max-w-xs for smaller width --}}
                <svg class="absolute left-2 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <select name="prodi_id" id="prodi_id" onchange="this.form.submit()"
                    class="w-full pl-9 pr-8 py-2 border border-dark-blue-200 rounded-lg text-sm focus:ring-2 focus:ring-dark-blue-500 focus:border-transparent transition-all duration-200 bg-white">
                    <option value="">Semua Prodi</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
                {{-- Removed the custom arrow SVG to rely on native select arrow --}}
            </div>
        </form>
    </div>

    {{-- Table Nilai --}}
    @if(count($nilaiList) > 0)
        <div class="bg-white rounded-2xl shadow-sm border border-dark-blue-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-dark-blue-50 to-red-accent-50">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-dark-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Data Nilai Mahasiswa
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Mahasiswa
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                NIM
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Mata Kuliah
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nilai
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($nilaiList as $item)
                            <tr class="hover:bg-gradient-to-r hover:from-dark-blue-50 hover:to-red-accent-50 transition-all duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                            {{ substr($item->user->name ?? 'M', 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $item->user->name ?? '-' }}</div>
                                            <div class="text-xs text-gray-500">Prodi: {{ $item->user->prodi->nama ?? '-' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $item->user->nim ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ $item->mataKuliah->nama ?? '-' }} ({{ $item->mataKuliah->sks ?? '0' }} SKS)
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold
                                        @if($item->nilai == 'A') bg-dark-blue-100 text-dark-blue-800
                                        @elseif($item->nilai == 'B') bg-dark-blue-100 text-dark-blue-800
                                        @elseif($item->nilai == 'C') bg-red-accent-100 text-red-accent-800
                                        @elseif($item->nilai == 'D') bg-red-accent-100 text-red-accent-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ $item->nilai ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('dosen.nilai.edit', $item->id) }}"
                                           class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-dark-blue-400 to-dark-blue-500 text-white text-xs font-medium rounded-lg hover:from-dark-blue-500 hover:to-dark-blue-600 transform hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
                                            Edit
                                        </a>
                                        <form action="{{ route('dosen.nilai.destroy', $item->id) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus nilai ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-red-accent-500 to-red-accent-600 text-white text-xs font-medium rounded-lg hover:from-red-accent-600 hover:to-red-accent-700 transform hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 text-sm text-gray-600">
                Total <span class="font-medium">{{ count($nilaiList) }}</span> data nilai ditemukan.
            </div>
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-dark-blue-100">
            <div class="mx-auto w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak ada data nilai ditemukan</h3>
            <p class="text-gray-500 mb-6 max-w-md mx-auto">
                Silakan pilih program studi atau tambahkan nilai baru untuk melihat daftar di sini.
            </p>
            <a href="{{ route('dosen.nilai.create') }}"
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Input Nilai Pertama
            </a>
        </div>
    @endif
</main>
@endsection