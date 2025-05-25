@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h1 class="text-3xl font-bold mb-8 text-center text-red-700">Tambah Dosen</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-5 rounded-lg mb-6 shadow-sm">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dosen.data.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nidn" class="block text-sm font-semibold text-gray-700 mb-2">NIDN</label>
            <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition"
                placeholder="Masukkan NIDN" />
            @error('nidn')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition"
                placeholder="Masukkan nama dosen" />
            @error('nama')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition"
                placeholder="Masukkan alamat email" />
            @error('email')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="jurusan_id" class="block text-sm font-semibold text-gray-700 mb-2">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" required
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition">
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
            <label for="prodi_id" class="block text-sm font-semibold text-gray-700 mb-2">Program Studi</label>
            <select name="prodi_id" id="prodi_id" required
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                <option value="">-- Pilih Program Studi --</option>
                {{-- Opsi akan diisi via JavaScript --}}
            </select>
            @error('prodi_id')
                <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-6 flex justify-end space-x-4">
            <a href="{{ route('admin.dosen.data.index') }}"
               class="px-5 py-3 rounded-md bg-gray-300 text-gray-800 font-semibold hover:bg-gray-400 transition">
               Batal
            </a>
            <button type="submit"
                class="px-6 py-3 rounded-md bg-red-700 text-white font-semibold hover:bg-red-800 transition">
                Simpan
            </button>
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

        // Jika ada old jurusan, langsung update pilihan prodi
        if (jurusanSelect.value) {
            updateProdiOptions(jurusanSelect.value);
        }
    });
</script>
@endsection
