@extends('layouts.mahasiswa')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-2">
                    Kartu Rencana Studi (KRS)
                </h1>
                <p class="text-gray-600">Kelola mata kuliah yang akan diambil semester ini</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('mahasiswa.krs.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Mata Kuliah
                </a>
            </div>
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 rounded-full mt-4"></div>
    </div>

    {{-- Success Alert --}}
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

    {{-- Info Mahasiswa --}}
    <div class="bg-white rounded-2xl shadow-sm border border-dark-blue-100 p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gradient-to-br from-dark-blue-400 to-red-accent-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                    {{ substr(auth()->user()->name ?? 'MH', 0, 2) }}
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">{{ auth()->user()->name ?? 'Nama Mahasiswa' }}</h3>
                    <p class="text-gray-600">NIM: {{ auth()->user()->nim ?? '123456789' }}</p>
                    <p class="text-sm text-gray-500">
                        Program Studi: {{ auth()->user()->prodi->nama ?? 'Teknik Informatika' }}
                    </p>
                </div>
            </div>
            <div class="text-right">
                <div class="bg-gradient-to-r from-dark-blue-100 to-red-accent-100 px-4 py-2 rounded-xl border border-dark-blue-200">
                    <p class="text-sm font-medium text-dark-blue-800">Semester Aktif</p>
                    <p class="text-lg font-bold text-dark-blue-700">Ganjil 2024/2025</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-sm border border-dark-blue-100 p-6 hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total SKS</p>
                    <p class="text-2xl font-bold text-dark-blue-600">
                        {{ $krsList->sum(function($krs) { return $krs->mataKuliah->sks; }) }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-dark-blue-100 p-6 hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Mata Kuliah</p>
                    <p class="text-2xl font-bold text-red-accent-600">{{ $krsList->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-red-accent-400 to-red-accent-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-dark-blue-100 p-6 hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Batas SKS</p>
                    <p class="text-2xl font-bold text-dark-blue-600">24</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-dark-blue-100 p-6 hover:shadow-lg transition-shadow duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Sisa SKS</p>
                    <p class="text-2xl font-bold text-red-accent-600">
                        {{ 24 - $krsList->sum(function($krs) { return $krs->mataKuliah->sks; }) }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-red-accent-400 to-red-accent-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- KRS Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-dark-blue-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-dark-blue-50 to-red-accent-50">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <svg class="w-5 h-5 text-dark-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                Daftar Mata Kuliah KRS
            </h3>
        </div>
        
        @if ($krsList->isEmpty())
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Mata Kuliah</h3>
                <p class="text-gray-500 mb-6 max-w-md mx-auto">
                    Anda belum mengambil mata kuliah untuk semester ini. Mulai dengan menambahkan mata kuliah pertama.
                </p>
                <a href="{{ route('mahasiswa.krs.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Mata Kuliah Pertama
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Kode MK
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama Mata Kuliah
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                SKS
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Hari
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Jam
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Ruangan
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Dosen
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($krsList as $index => $krs)
                        <tr class="hover:bg-gradient-to-r hover:from-dark-blue-50 hover:to-red-accent-50 transition-all duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-dark-blue-400 to-dark-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                        {{ substr($krs->mataKuliah->kode, 0, 5) }}
                                    </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $krs->mataKuliah->nama }}</div>
                                <div class="text-xs text-gray-500">Mata Kuliah {{ $index % 2 == 0 ? 'Wajib' : 'Pilihan' }}</div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-dark-blue-100 text-dark-blue-800 border border-dark-blue-200">
                                    {{ $krs->mataKuliah->sks }} SKS
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $krs->jadwal->hari ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $krs->jadwal ? ($krs->jadwal->jam_mulai . ' - ' . $krs->jadwal->jam_selesai) : '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $krs->jadwal->ruangan ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $krs->jadwal->dosen->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <a href="{{ route('mahasiswa.krs.edit', $krs) }}" 
                                       class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-dark-blue-400 to-dark-blue-500 text-white text-xs font-medium rounded-lg hover:from-dark-blue-500 hover:to-dark-blue-600 transform hover:-translate-y-0.5 transition-all duration-200 shadow-sm hover:shadow-md">
                                        Edit
                                    </a>
                                    <form action="{{ route('mahasiswa.krs.destroy', $krs) }}" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Yakin ingin menghapus mata kuliah {{ $krs->mataKuliah->nama }}?');">
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

            {{-- Footer Info --}}
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        Total <span class="font-medium">{{ $krsList->count() }}</span> mata kuliah terpilih
                    </div>
                    <div class="text-sm text-gray-500">
                        <span class="font-medium">{{ $krsList->sum(function($krs) { return $krs->mataKuliah->sks; }) }} SKS</span> dari maksimal 24 SKS
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- Action Buttons --}}
    @if (!$krsList->isEmpty())
        <div class="mt-8 flex justify-center gap-4">
            <button class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-dark-blue-500 to-dark-blue-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-dark-blue-700 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Simpan KRS
            </button>
            <button class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-accent-500 to-red-accent-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-red-accent-600 hover:to-red-accent-700 transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Cetak KRS
            </button>
        </div>
    @endif
</main>
@endsection