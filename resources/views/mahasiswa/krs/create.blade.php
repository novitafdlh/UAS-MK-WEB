@extends('layouts.mahasiswa')

@section('title', 'Tambah Mata Kuliah KRS')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-2">
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
        <div class="w-24 h-1 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 rounded-full mt-4"></div>
    </div>

    {{-- Form Section --}}
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow border border-dark-blue-100">
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="GET" action="{{ route('mahasiswa.krs.create') }}" class="space-y-6">
            <div>
                <label for="mata_kuliah_id" class="block mb-2 font-semibold text-gray-700">Mata Kuliah</label>
                <select name="mata_kuliah_id" id="mata_kuliah_id" required
                    class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white"
                    onchange="this.form.submit()">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliahs as $mk)
                        <option value="{{ $mk->id }}" {{ request('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                            {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS)
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        @if(isset($jadwal))
            <div class="mt-4 p-4 bg-dark-blue-50 rounded-xl text-sm text-dark-blue-700 border border-dark-blue-100">
                <p class="font-bold mb-1">Detail Jadwal:</p>
                <p>Hari: <b class="text-dark-blue-800">{{ $jadwal->hari }}</b></p>
                <p>Jam: <b class="text-dark-blue-800">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</b></p>
                <p>Ruangan: <b class="text-dark-blue-800">{{ $jadwal->ruangan }}</b></p>
                <p>Dosen: <b class="text-dark-blue-800">{{ $jadwal->dosen->name ?? '-' }}</b></p>
            </div>
        @elseif(request('mata_kuliah_id'))
            <div class="mt-4 text-red-accent-600 p-4 bg-red-accent-50 rounded-xl border border-red-accent-100">Jadwal belum tersedia untuk mata kuliah ini.</div>
        @endif

        @if(request('mata_kuliah_id') && isset($jadwal))
            <form method="POST" action="{{ route('mahasiswa.krs.store') }}" class="pt-6 flex justify-end gap-4">
                @csrf
                <input type="hidden" name="mata_kuliah_id" value="{{ request('mata_kuliah_id') }}">
                <a href="{{ route('mahasiswa.krs.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-xl shadow-md hover:bg-gray-300 transition-all duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Simpan KRS
                </button>
            </form>
        @endif
    </div>
</main>
@endsection