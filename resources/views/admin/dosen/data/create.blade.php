@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Tambah Dosen</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dosen.data.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nidn" class="block font-semibold mb-1">NIDN</label>
            <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nidn')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="nama" class="block font-semibold mb-1">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('nama')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="jurusan_id" class="block font-semibold mb-1">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
            @error('jurusan_id')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="prodi_id" class="block font-semibold mb-1">Program Studi</label>
            <select name="prodi_id" id="prodi_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">-- Pilih Program Studi --</option>
                {{-- Opsi ini akan diisi via JavaScript --}}
            </select>
            @error('prodi_id')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                Simpan
            </button>
            <a href="{{ route('admin.dosen.data.index') }}" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jurusanSelect = document.getElementById('jurusan_id');
        const prodiSelect = document.getElementById('prodi_id');

        // Mengambil semua data prodi dari variabel PHP dan menyimpannya di JavaScript
        // Ini akan jadi objek JavaScript yang berisi semua prodi, dikelompokkan berdasarkan jurusan_id
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
            prodiSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>'; // Reset prodi options

            if (selectedJurusanId && allProdis[selectedJurusanId]) {
                allProdis[selectedJurusanId].forEach(prodi => {
                    const option = document.createElement('option');
                    option.value = prodi.id;
                    option.textContent = prodi.nama;
                    // Pre-select jika old('prodi_id') cocok
                    if ("{{ old('prodi_id') }}" == prodi.id) {
                        option.selected = true;
                    }
                    prodiSelect.appendChild(option);
                });
            }
        }

        // Event listener saat jurusan berubah
        jurusanSelect.addEventListener('change', function () {
            const selectedJurusanId = this.value;
            updateProdiOptions(selectedJurusanId);
        });

        // Panggil fungsi ini saat halaman dimuat jika ada old('jurusan_id')
        // Ini penting agar dropdown prodi terisi jika ada validasi error dan form di-reload dengan old input
        const initialJurusanId = jurusanSelect.value;
        if (initialJurusanId) {
            updateProdiOptions(initialJurusanId);
        }
    });
</script>
@endsection