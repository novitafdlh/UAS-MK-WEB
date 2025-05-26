@extends('layouts.dosen')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-rose-50 to-red-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent mb-2">
                    Input Nilai Mahasiswa
                </h1>
                <p class="text-gray-600">Masukkan nilai untuk mahasiswa berdasarkan mata kuliah</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('dosen.nilai.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-gray-600 hover:to-gray-700 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

    {{-- Form Section --}}
    <div class="max-w-4xl mx-auto space-y-8">
        {{-- Step 1: Filter Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-rose-50 to-red-50">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-rose-500 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        1
                    </div>
                    Pilih Data untuk Input Nilai
                </h3>
            </div>
            
            <div class="p-6">
                <form method="GET" action="{{ route('dosen.nilai.create') }}" class="space-y-6">
                    {{-- Pilih Prodi --}}
                    <div>
                        <label for="prodi_id" class="block text-sm font-semibold text-gray-700 mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Program Studi
                            </div>
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <select name="prodi_id" id="prodi_id" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all duration-200 appearance-none bg-white"
                                    onchange="this.form.submit()">
                                <option value="">-- Pilih Program Studi --</option>
                                @foreach($prodis as $prodi)
                                    <option value="{{ $prodi->id }}" {{ ($selectedProdiId == $prodi->id) ? 'selected' : '' }}>
                                        {{ $prodi->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    {{-- Pilih Mata Kuliah --}}
                    @if($selectedProdiId)
                    <div>
                        <label for="mata_kuliah_id" class="block text-sm font-semibold text-gray-700 mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Mata Kuliah
                            </div>
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <select name="mata_kuliah_id" id="mata_kuliah_id" 
                                    class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all duration-200 appearance-none bg-white"
                                    onchange="this.form.submit()">
                                <option value="">-- Pilih Mata Kuliah --</option>
                                @foreach($mataKuliahs as $mk)
                                    <option value="{{ $mk->id }}" {{ ($selectedMataKuliahId == $mk->id) ? 'selected' : '' }}>
                                        {{ $mk->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @endif

    {{-- Pilih Mahasiswa --}}
    @if($selectedMataKuliahId)
    <div>
        <label for="mahasiswa_id" class="block font-medium">Pilih Mahasiswa</label>
        <select name="mahasiswa_id" id="mahasiswa_id" class="border p-2 rounded w-full" onchange="this.form.submit()">
            <option value="">-- Pilih Mahasiswa --</option>
            @foreach($mahasiswas as $mhs)
                <option value="{{ $mhs->id }}" {{ ($selectedMahasiswaId == $mhs->id) ? 'selected' : '' }}>
                    {{ $mhs->nama }}
                </option>
            @endforeach
        </select>
    </div>
    @endif
</form>

        {{-- Step 2: Input Nilai Form --}}
        @if($selectedMahasiswaId && $selectedMataKuliahId)
        <div class="bg-white rounded-2xl shadow-sm border border-green-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-emerald-50">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                        2
                    </div>
                    Input Nilai
                </h3>
            </div>
            
            <div class="p-6">
                {{-- Info Section --}}
                <div class="mb-6 p-4 bg-gradient-to-r from-rose-50 to-red-50 border border-rose-200 rounded-xl">
                    @php
                        $selectedMhs = $mahasiswas->firstWhere('id', $selectedMahasiswaId);
                        $selectedMk = $mataKuliahs->firstWhere('id', $selectedMataKuliahId);
                    @endphp
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-rose-400 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                            {{ substr($selectedMhs->nama ?? 'M', 0, 2) }}
                        </div>
                        <div>
                            <h4 class="text-rose-800 font-semibold">{{ $selectedMhs->nama ?? '-' }}</h4>
                            <p class="text-rose-600 text-sm">Mata Kuliah: {{ $selectedMk->nama ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('dosen.nilai.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="mata_kuliah_id" value="{{ $selectedMataKuliahId }}">
                    <input type="hidden" name="mahasiswa_id" value="{{ $selectedMahasiswaId }}">

                    <div>
                        <label for="nilai" class="block text-sm font-semibold text-gray-700 mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                Nilai
                            </div>
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            <input type="text" 
                                   name="nilai" 
                                   id="nilai"
                                   placeholder="Masukkan nilai (A, B, C, D, E)"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                                   required>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Masukkan nilai dalam format huruf (A, B, C, D, E)</p>
                    </div>

                    <div class="flex justify-between items-center pt-6 border-t border-gray-100">
                        <a href="{{ route('dosen.nilai.create') }}" 
                           class="inline-flex items-center px-4 py-2 text-gray-600 hover:text-gray-800 font-medium transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Pilih Ulang
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-green-600 hover:to-green-700 transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Simpan Nilai
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</main>
@endsection
