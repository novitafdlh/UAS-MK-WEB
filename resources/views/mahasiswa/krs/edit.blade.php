@extends('layouts.mahasiswa')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-2xl border border-gray-300 mt-16 mb-16">
        <h2 class="text-3xl font-bold text-red-800 mb-6 text-center border-b-2 border-red-200 pb-4">
            ✏️ Edit Kartu Rencana Studi (KRS)
        </h2>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-100 text-red-800 px-5 py-3 rounded-lg border border-red-300">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('mahasiswa.krs.update', $krs) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Pilih Mata Kuliah --}}
            <div>
                <label for="mata_kuliah_id" class="block mb-2 text-lg font-semibold text-gray-700">
                    Pilih Mata Kuliah
                </label>
                <select name="mata_kuliah_id" id="mata_kuliah_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none text-base">
                    @foreach ($matakuliahs as $mk)
                        <option value="{{ $mk->id }}" {{ $mk->id == $krs->mata_kuliah_id ? 'selected' : '' }}>
                            {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS)
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('mahasiswa.krs.index') }}"
                   class="text-gray-600 hover:underline text-base font-medium">
                    ← Kembali ke daftar KRS
                </a>
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
