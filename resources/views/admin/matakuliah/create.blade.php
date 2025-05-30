@extends('layouts.admin')

@section('title', 'Tambah Matakuliah')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-white to-white min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
                    Tambah Matakuliah
                </h1>
                <p class="text-black-600">Tambahkan matakuliah baru ke sistem</p>
            </div>
           
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

    {{-- Form Container --}}
    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 max-w-lg mx-auto p-8">
        
        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.matakuliah.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="kode" class="block mb-2 font-semibold text-gray-700">Kode Matakuliah</label>
                <input type="text" name="kode" id="kode" value="{{ old('kode') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" 
                    placeholder="Contoh: IF101" />
            </div>

            <div>
                <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Matakuliah</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" 
                    placeholder="Contoh: Pemrograman Dasar" />
            </div>

            <div>
                <label for="sks" class="block mb-2 font-semibold text-gray-700">SKS</label>
                <input type="number" name="sks" id="sks" value="{{ old('sks') }}" required min="0"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none" 
                    placeholder="Jumlah SKS" />
            </div>

            <div>
                <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" required class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="prodi_id" class="block mb-2 font-semibold text-gray-700">Prodi</label>
                <select name="prodi_id" id="prodi_id" required class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi->id }}" data-jurusan="{{ $prodi->jurusan_id }}">{{ $prodi->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="dosen_id" class="block mb-2 font-semibold text-gray-700">Dosen Pengampu</label>
                <select name="dosen_id" id="dosen_id"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:outline-none">
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($dosens as $dosen)
                        <option value="{{ $dosen->id }}" data-prodi_id="{{ $dosen->prodi_id }}"
                            {{ old('dosen_id') == $dosen->id ? 'selected' : '' }}>
                            {{ $dosen->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.matakuliah.index') }}" 
                   class="px-6 py-3 text-gray-600 font-semibold rounded-lg hover:underline">
                    Batal
                </a>
                <button type="submit" 
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const jurusanSelect = document.getElementById('jurusan_id');
    const prodiSelect = document.getElementById('prodi_id');
    const dosenSelect = document.getElementById('dosen_id');
    const allProdiOptions = Array.from(prodiSelect.options);
    const allDosenOptions = Array.from(dosenSelect.options);

    // Filter prodi berdasarkan jurusan
    jurusanSelect.addEventListener('change', function () {
        const jurusanId = this.value;
        prodiSelect.innerHTML = '';
        allProdiOptions.forEach(option => {
            if (option.value === "" || option.getAttribute('data-jurusan') === jurusanId) {
                prodiSelect.appendChild(option.cloneNode(true));
            }
        });
        // Reset dosen saat jurusan berubah
        dosenSelect.innerHTML = '<option value="">-- Pilih Dosen --</option>';
    });

    // Filter dosen berdasarkan prodi
    prodiSelect.addEventListener('change', function () {
        const prodiId = this.value;
        dosenSelect.innerHTML = '<option value="">-- Pilih Dosen --</option>';
        allDosenOptions.forEach(option => {
            if (option.value === "") return;
            if (option.getAttribute('data-prodi_id') === prodiId) {
                dosenSelect.appendChild(option.cloneNode(true));
            }
        });
    });
});
</script>
@endsection
