@extends('layouts.admin')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-white to-white min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text">
                    Tambah Data Dosen
                </h1>
                <p class="text-black-600">Tambahkan data dosen ke sistem</p>
            </div>
           
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-rose-400 to-red-500 rounded-full mt-4"></div>
    </div>

<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg mt-10">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-red-500">Tambah Data Dosen</h1>

    @if($errors->any())
    <div class="mb-6 bg-red-50 border border-red-300 text-red-700 px-5 py-4 rounded-lg shadow-sm">
        <strong class="font-semibold">Oops! Ada masalah:</strong>
        <span class="block mt-1">Pastikan semua field terisi dengan benar.</span>
        <ul class="mt-3 list-disc list-inside text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.dosen.data.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nidn" class="block text-sm font-semibold text-black mb-2">NIDN</label>
            <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}"
                class="w-full px-4 py-3 border border-gray-400 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:outline-none transition
                @error('nidn') border-red-500 @enderror"
                required placeholder="Masukkan NIDN" />
            @error('nidn')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nama" class="block text-sm font-semibold text-black mb-2">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                class="w-full px-4 py-3 border border-gray-400 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:outline-none transition
                @error('nama') border-red-500 @enderror"
                required placeholder="Masukkan nama dosen" />
            @error('nama')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-black mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full px-4 py-3 border border-gray-400 rounded-md placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:outline-none transition
                @error('email') border-red-500 @enderror"
                required placeholder="Masukkan alamat email" />
            @error('email')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="jurusan_id" class="block text-sm font-semibold text-black mb-2">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" required
                class="w-full px-4 py-3 border border-gray-400 rounded-md bg-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
            @error('jurusan_id')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="prodi_id" class="block text-sm font-semibold text-white mb-2">Program Studi</label>
            <select name="prodi_id" id="prodi_id" required
                class="w-full px-4 py-3 border border-gray-400 rounded-md bg-white focus:ring-2 focus:ring-red-500 focus:outline-none transition">
                <option value="">-- Pilih Program Studi --</option>
                {{-- Opsi akan diisi via JavaScript --}}
            </select>
            @error('prodi_id')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-md transition duration-200">
                Simpan Data
            </button>
        </div>

        <div class="text-center">
            <a href="{{ route('admin.dosen.data.index') }}"
               class="inline-block mt-4 text-white underline hover:text-gray-100 transition">
                Kembali ke daftar dosen
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jurusanSelect = document.getElementById('jurusan_id');
        const prodiSelect = document.getElementById('prodi_id');

        const allProdis = {
            @foreach($jurusans as $jurusan)
                {{ $jurusan->id }}: [
                    @foreach($jurusan->prodis as $prodi)
                        { id: {{ $prodi->id }}, nama: "{{ $prodi->nama }}" },
                    @endforeach
                ],
            @endforeach
        };

        function updateProdiOptions(selectedJurusanId) {
            prodiSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';

            if (selectedJurusanId && allProdis[selectedJurusanId]) {
                allProdis[selectedJurusanId].forEach(prodi => {
                    const option = document.createElement('option');
                    option.value = prodi.id;
                    option.textContent = prodi.nama;
                    if ("{{ old('prodi_id') }}" == prodi.id) {
                        option.selected = true;
                    }
                    prodiSelect.appendChild(option);
                });
            }
        }

        jurusanSelect.addEventListener('change', function () {
            updateProdiOptions(this.value);
        });

        if (jurusanSelect.value) {
            updateProdiOptions(jurusanSelect.value);
        }
    });
</script>
@endsection
