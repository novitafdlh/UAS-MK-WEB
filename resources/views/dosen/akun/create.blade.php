@extends('layouts.dosen')

@section('title', 'Lengkapi Data Dosen')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Lengkapi Data Pribadi Dosen</h2>
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('dosen.akun.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label for="nidn" class="block mb-2 font-semibold text-gray-700">NIDN</label>
            <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label for="prodi_id" class="block mb-2 font-semibold text-gray-700">Prodi</label>
            <select name="prodi_id" id="prodi_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="alamat" class="block mb-2 font-semibold text-gray-700">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label for="no_hp" class="block mb-2 font-semibold text-gray-700">No. HP</label>
            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div class="flex justify-end gap-4 pt-4">
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection