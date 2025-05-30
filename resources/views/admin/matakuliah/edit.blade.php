@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.matakuliah.update', $matakuliah->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="kode" class="block mb-2 font-semibold text-gray-700">Kode</label>
            <input type="text" name="kode" id="kode" value="{{ old('kode', $matakuliah->kode) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $matakuliah->nama) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div>
            <label for="sks" class="block mb-2 font-semibold text-gray-700">SKS</label>
            <input type="number" name="sks" id="sks" value="{{ old('sks', $matakuliah->sks) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div>
            <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $matakuliah->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="prodi_id" class="block mb-2 font-semibold text-gray-700">Prodi</label>
            <select name="prodi_id" id="prodi_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" data-jurusan="{{ $prodi->jurusan_id }}"
                        {{ old('prodi_id', $matakuliah->prodi_id) == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="dosen_id" class="block mb-2 font-semibold text-gray-700">Dosen Pengampu</label>
            <select name="dosen_id" id="dosen_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}" data-prodi_id="{{ $dosen->prodi_id }}"
                        {{ old('dosen_id', $matakuliah->dosen_id) == $dosen->id ? 'selected' : '' }}>
                        {{ $dosen->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200 ">
                Update
            </button>
        </div>
    </form>

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
            dosenSelect.innerHTML = '';
        });

        // Filter dosen berdasarkan prodi
        prodiSelect.addEventListener('change', function () {
            const prodiId = this.value;
            dosenSelect.innerHTML = '';
            allDosenOptions.forEach(option => {
                if (option.value === "") return;
                if (option.getAttribute('data-prodi_id') === prodiId) {
                    dosenSelect.appendChild(option.cloneNode(true));
                }
            });
        });

        // Trigger filter saat halaman edit dibuka (agar value terpilih tetap muncul)
        if (jurusanSelect.value) {
            jurusanSelect.dispatchEvent(new Event('change'));
        }
        if (prodiSelect.value) {
            prodiSelect.dispatchEvent(new Event('change'));
        }
    });
    </script>
@endsection
