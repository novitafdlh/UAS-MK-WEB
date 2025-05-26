@extends('layouts.mahasiswa')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-rose-50 to-red-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent mb-2">
                    Tambah Mata Kuliah KRS
                </h1>
                <p class="text-gray-600">Pilih mata kuliah yang akan diambil semester ini</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('mahasiswa.krs.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-gray-600 hover:to-gray-700 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke KRS
                </a>
            </div>
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

    {{-- Form Section --}}
    <div class="max-w-4xl mx-auto">
        {{-- Step 1: Pilih Prodi --}}
        <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-rose-50 to-red-50">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-rose-500 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        1
                    </div>
                    Pilih Program Studi
                </h3>
            </div>
            
            <div class="p-6">
                <form action="{{ route('mahasiswa.krs.create') }}" method="GET">
                    <div class="mb-6">
                        <label for="prodi_id" class="block text-sm font-semibold text-gray-700 mb-3">
                            Program Studi
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <select name="prodi_id" id="prodi_id" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all duration-200 appearance-none bg-white">
                                <option value="" disabled {{ request('prodi_id') ? '' : 'selected' }}>-- Pilih Program Studi --</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                                        {{ $prodi->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-rose-500 to-red-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-rose-600 hover:to-red-600 transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Tampilkan Mata Kuliah
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Step 2: Pilih Mata Kuliah (jika sudah pilih prodi) --}}
        @if(request('prodi_id'))
        <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        2
                    </div>
                    Pilih Mata Kuliah
                </h3>
            </div>
            
            <div class="p-6">
                <form action="{{ route('mahasiswa.krs.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="prodi_id" value="{{ request('prodi_id') }}">

                    <div class="mb-6">
                        <label for="mata_kuliah_id" class="block text-sm font-semibold text-gray-700 mb-3">
                            Mata Kuliah
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <select name="mata_kuliah_id" id="mata_kuliah_id" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none bg-white">
                                <option value="" disabled selected>-- Pilih Mata Kuliah --</option>
                                @foreach($matakuliahs as $mk)
                                    <option value="{{ $mk->id }}" {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                                        {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS)
                                    </option>
                                @endforeach
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    {{-- Available Mata Kuliah Info --}}
                    @if($matakuliahs->count() > 0)
                    <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-green-800 font-medium">
                                Tersedia {{ $matakuliahs->count() }} mata kuliah untuk program studi ini
                            </span>
                        </div>
                    </div>
                    @endif

                    <div class="flex justify-between items-center">
                        <a href="{{ route('mahasiswa.krs.create') }}" 
                           class="inline-flex items-center px-4 py-2 text-gray-600 hover:text-gray-800 font-medium transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Pilih Ulang Prodi
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-green-600 hover:to-green-700 transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Simpan ke KRS
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</main>
@endsection
