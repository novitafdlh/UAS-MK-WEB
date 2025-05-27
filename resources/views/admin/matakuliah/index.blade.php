@extends('layouts.admin')

@section('title', 'Daftar Mata Kuliah')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-white min-h-screen">
    {{-- Header --}}
    <header class="bg-white rounded-2xl shadow-sm border border-rose-100 p-6 mb-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <img src="{{ asset('img/untad-new.jpeg') }}" 
                         alt="Logo Untad" 
                         class="w-14 h-14 object-contain rounded-xl shadow-md ring-2 ring-rose-100" />
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
                        Daftar Mata Kuliah
                    </h1>
                    <p class="text-sm text-rose-500 font-medium">Kelola mata kuliah universitas</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.matakuliah.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-300 to-red-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-red-600 hover:to-red-300 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Mata Kuliah
                </a>
            </div>
        </div>
    </header>

    {{-- Page Title --}}
    <div class="text-center mb-8 bg-gradient-to-r from-white to-white p-6 rounded-xl shadow-sm">
        <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
            Manajemen Mata Kuliah
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-red-200 to-red-600 mx-auto rounded-full"></div>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
                <button type="button" class="ml-auto p-1.5 text-green-500 hover:bg-green-100 rounded-lg" onclick="this.parentElement.parentElement.remove();">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="group relative bg-white rounded-2xl shadow-sm border border-rose-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
            <div class="absolute top-4 right-4 w-12 h-12 bg-gradient-to-br from-red-400 to-rose-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Mata Kuliah</h3>
            <p class="text-3xl font-bold text-rose-600 mb-1">{{ $matakuliahs->count() }}</p>
            <p class="text-sm text-gray-500">Mata kuliah aktif</p>
        </div>
    </div>

    {{-- Tabel Mata Kuliah --}}
    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
        {{-- Header Section --}}
        <div class="bg-gradient-to-r from-rose-500 to-red-500 p-6 text-black">
            <h2 class="text-2xl md:text-3xl font-bold text-center flex items-center justify-center gap-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                Data Mata Kuliah
            </h2>
        </div>

        <div class="p-6 md:p-8">
            @if($matakuliahs->isEmpty())
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg font-medium">Belum ada mata kuliah</p>
                    <p class="text-gray-400 text-sm mt-1">Tambahkan mata kuliah pertama Anda</p>
                </div>
            @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-rose-200">
                    <thead class="bg-rose-100">
    <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode & Nama</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosen Pengampu</th>
        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
    </tr>
</thead>
<tbody class="bg-white divide-y divide-rose-100">
    @foreach($matakuliahs as $matakuliah)
    <tr class="hover:bg-rose-50 transition-colors duration-200">
        <td class="px-6 py-4">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-br from-rose-100 to-red-100 rounded-xl flex items-center justify-center mr-4">
                    <span class="text-sm font-bold text-rose-600">{{ substr($matakuliah->kode, 0, 3) }}</span>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-900">{{ $matakuliah->nama }}</div>
                    <div class="text-sm text-gray-500">{{ $matakuliah->kode }}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-rose-100 text-rose-800">
                {{ $matakuliah->sks }} SKS
            </span>
        </td>
        <td class="px-6 py-4 text-sm text-gray-900">
            {{ $matakuliah->jurusan ?? '-' }}
        </td>
        <td class="px-6 py-4 text-sm text-gray-900">
            {{ $matakuliah->prodi->nama ?? '-' }}
        </td>
        <td class="px-6 py-4 text-sm text-gray-900">
            {{ $matakuliah->dosen->nama ?? '-' }}
        </td>
        <td class="px-6 py-4 text-center">
            <div class="flex items-center justify-center space-x-2">
                <a href="{{ route('admin.matakuliah.edit', $matakuliah->id) }}"
                   class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-red-500 to-red-500 text-white text-xs font-medium rounded-lg hover:from-amber-500 hover:to-orange-500 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <form action="{{ route('admin.matakuliah.destroy', $matakuliah->id) }}" method="POST" class="inline"
                      onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-red-500 to-red-500 text-white text-xs font-medium rounded-lg hover:from-red-600 hover:to-rose-600 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
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
            @endif
        </div>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-6 mt-8">
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-sm border border-rose-100">
            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <span class="text-sm text-gray-600">
                &copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.
            </span>
        </div>
    </footer>
</main>
@endsection