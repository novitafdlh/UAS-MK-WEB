@extends('layouts.admin')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-white to-white min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
                    Tambah Jadwal
                </h1>
                <p class="text-black-600">Tambahkan jadwal baru ke sistem</p>
            </div>
            
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

<div class="max-w-3xl mx-auto mt-8 px-8 py-10 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-8 text-center text-red-700">Tambah Jadwal Baru</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded shadow">
            <strong class="font-semibold">Oops!</strong> Ada beberapa masalah dengan input Anda.
            <ul class="list-disc list-inside mt-2 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
            @error('jurusan_id')
                <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="prodi_id" class="block mb-2 font-semibold text-gray-700">Prodi</label>
            <select name="prodi_id" id="prodi_id" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" data-jurusan="{{ $prodi->jurusan_id }}"
                        {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
            @error('prodi_id')
                <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="dosen_id" class="block mb-2 font-semibold text-gray-700">Dosen</label>
            <select name="dosen_id" id="dosen_id" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}" data-prodi="{{ $dosen->prodi_id }}"
                        {{ old('dosen_id') == $dosen->id ? 'selected' : '' }}>
                        {{ $dosen->name }}
                    </option>
                @endforeach
            </select>
            @error('dosen_id')
                <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="mata_kuliah_id" class="block mb-2 font-semibold text-gray-700">Mata Kuliah</label>
            <select name="mata_kuliah_id" id="mata_kuliah_id" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($matakuliahs as $mk)
                    <option value="{{ $mk->id }}" data-dosen="{{ $mk->dosen_id }}"
                        {{ old('mata_kuliah_id') == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama }}
                    </option>
                @endforeach
            </select>
            @error('mata_kuliah_id')
                <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="hari" class="block mb-2 font-semibold text-gray-700">Hari</label>
            <select name="hari" id="hari" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Hari --</option>
                @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                    <option value="{{ $hari }}" {{ old('hari') == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                @endforeach
            </select>
            @error('hari')
                <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-6">
            <div class="flex-1">
                <label for="jam_mulai" class="block mb-2 font-semibold text-gray-700">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai') }}" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                @error('jam_mulai')
                    <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex-1">
                <label for="jam_selesai" class="block mb-2 font-semibold text-gray-700">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai') }}" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                @error('jam_selesai')
                    <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="ruangan" class="block mb-2 font-semibold text-gray-700">Ruangan</label>
            <input type="text" name="ruangan" id="ruangan" value="{{ old('ruangan') }}" required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('ruangan')
                <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center pt-6">
            <a href="{{ route('admin.jadwal.index') }}" class="text-gray-600 hover:underline font-semibold">
                Batal
            </a>
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold px-6 py-2 rounded shadow transition duration-200">
                Simpan Jadwal
            </button>
        </div>
    </form>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const jurusanSelect = document.getElementById('jurusan_id');
    const prodiSelect = document.getElementById('prodi_id');
    const dosenSelect = document.getElementById('dosen_id');
    const matkulSelect = document.getElementById('mata_kuliah_id');
    const allProdiOptions = Array.from(prodiSelect.options);
    const allDosenOptions = Array.from(dosenSelect.options);
    const allMatkulOptions = Array.from(matkulSelect.options);

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
        dosenSelect.innerHTML = '';
        matkulSelect.innerHTML = '';
    });

    // Filter dosen berdasarkan prodi
    prodiSelect.addEventListener('change', function () {
        const prodiId = this.value;
        dosenSelect.innerHTML = '';
        allDosenOptions.forEach(option => {
            if (option.value === "" || option.getAttribute('data-prodi') === prodiId) {
                dosenSelect.appendChild(option.cloneNode(true));
            }
        });
        matkulSelect.innerHTML = '';
    });

    // Filter mata kuliah berdasarkan dosen
    dosenSelect.addEventListener('change', function () {
        const dosenId = this.value;
        matkulSelect.innerHTML = '';
        allMatkulOptions.forEach(option => {
            if (option.value === "" || option.getAttribute('data-dosen') === dosenId) {
                matkulSelect.appendChild(option.cloneNode(true));
            }
        });
    });

    // Trigger filter saat halaman dibuka (untuk old value)
    if (jurusanSelect.value) {
        jurusanSelect.dispatchEvent(new Event('change'));
    }
    if (prodiSelect.value) {
        prodiSelect.dispatchEvent(new Event('change'));
    }
    if (dosenSelect.value) {
        dosenSelect.dispatchEvent(new Event('change'));
    }
    if (matkulSelect.value) {
        matkulSelect.dispatchEvent(new Event('change'));
    }
});
</script>
