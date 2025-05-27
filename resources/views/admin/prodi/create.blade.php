@extends('layouts.admin')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-white to-white min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-textt">
                    Tambah Program Studi
                </h1>
                <p class="text-black-600">Tambahkan program studi baru ke sistem</p>
            </div>
            
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

    {{-- Error Alert --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg shadow-sm">
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <section class="max-w-3xl mx-auto bg-white p-6 md:p-8 rounded-2xl shadow border border-rose-100">
        <form action="{{ route('admin.prodi.store') }}" method="POST" class="space-y-6">
                <h1 class="text-3xl font-bold mb-8 text-center text-red-700">Tambah Jadwal Baru</h1>
            @csrf

            {{-- Pilih Jurusan --}}
            <div>
                <label for="jurusan_id" class="block text-sm font-semibold text-gray-700 mb-1">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-400 focus:outline-none">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($jurusan as $item)
                        <option value="{{ $item->id }}" {{ old('jurusan_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Prodi --}}
            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Program Studi</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-rose-400 focus:outline-none" />
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end items-center gap-4 pt-4">
                <a href="{{ route('admin.prodi.index') }}"
                   class="text-gray-600 hover:text-red-700 font-medium transition duration-150">
                    Batal
                </a>
                <button type="submit"
                        class="bg-red-600 hover:bg-rose-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </section>
</main>
@endsection
