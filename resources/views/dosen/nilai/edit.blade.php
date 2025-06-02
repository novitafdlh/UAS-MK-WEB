@extends('layouts.dosen')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-2">
                    Edit Nilai Mahasiswa
                </h1>
                <p class="text-gray-600">Perbarui nilai untuk mahasiswa ini</p>
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
        <div class="w-24 h-1 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 rounded-full mt-4"></div>
    </div>

    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-md border border-dark-blue-100">
        <h2 class="text-2xl font-bold mb-6 text-center bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent">
            Form Edit Nilai
        </h2>

        @if($errors->any())
            <div class="bg-red-accent-100 border border-red-accent-400 text-red-accent-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dosen.nilai.update', $nilai->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Nama Mahasiswa</label>
                <input type="text" value="{{ $nilai->user->name }}" class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">Mata Kuliah</label>
                <input type="text" value="{{ $nilai->matakuliah->nama }}" class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg bg-gray-100 cursor-not-allowed" readonly>
            </div>

            <div>
                <label for="nilai" class="block mb-2 font-semibold text-gray-700">Nilai</label>
                <select name="nilai" id="nilai" required
                    class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white">
                    @foreach(['A', 'B', 'C', 'D', 'E'] as $huruf)
                        <option value="{{ $huruf }}" {{ old('nilai', $nilai->nilai) == $huruf ? 'selected' : '' }}>{{ $huruf }}</option>
                    @endforeach
                </select>
                @error('nilai')<p class="text-red-accent-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
                <a href="{{ route('dosen.nilai.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-xl shadow-md hover:bg-gray-300 transition-all duration-200">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</main>
@endsection