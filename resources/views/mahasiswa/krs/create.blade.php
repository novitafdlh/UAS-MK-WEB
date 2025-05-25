@extends('layouts.mahasiswa')

@section('content')
<div class="max-w-3xl mx-auto mt-8 px-8 py-10 bg-white rounded-lg shadow-lg">
    {{-- Judul --}}
    <h1 class="text-3xl font-bold mb-8 text-center text-red-700">Tambah KRS Baru</h1>

    {{-- Form pilih prodi --}}
    <form action="{{ route('mahasiswa.krs.create') }}" method="GET" class="mb-10">
        <div>
            <label for="prodi_id" class="block mb-2 font-semibold text-gray-700">Prodi</label>
            <select name="prodi_id" id="prodi_id" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="" disabled {{ request('prodi_id') ? '' : 'selected' }}>-- Pilih Prodi --</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end pt-6">
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold px-6 py-2 rounded shadow transition duration-200">
                Tampilkan Mata Kuliah
            </button>
        </div>
    </form>

    {{-- Jika sudah pilih Prodi, tampilkan form tambah KRS --}}
    @if(request('prodi_id'))
    <form action="{{ route('mahasiswa.krs.store') }}" method="POST" class="border-t pt-8">
        @csrf
        <input type="hidden" name="prodi_id" value="{{ request('prodi_id') }}">

        <div>
            <label for="mata_kuliah_id" class="block mb-2 font-semibold text-gray-700">Mata Kuliah</label>
            <select name="mata_kuliah_id" id="mata_kuliah_id" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="" disabled selected>-- Pilih Mata Kuliah --</option>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                        {{ $mk->kode }} - {{ $mk->nama }} ({{ $mk->sks }} SKS)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between items-center pt-6">
            <a href="{{ route('mahasiswa.krs.create') }}" class="text-gray-600 hover:underline font-semibold">
                Batal
            </a>
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold px-6 py-2 rounded shadow transition duration-200">
                Simpan KRS
            </button>
        </div>
    </form>
    @endif
</div>
@endsection
