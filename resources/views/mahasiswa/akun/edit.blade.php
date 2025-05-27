@extends('layouts.mahasiswa')

@section('title', 'Edit Data Mahasiswa')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Edit Data Pribadi Mahasiswa</h2>
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('mahasiswa.akun.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="nim" class="block mb-2 font-semibold text-gray-700">NIM</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $mahasiswa->email) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $mahasiswa->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="prodi_id" class="block mb-2 font-semibold text-gray-700">Prodi</label>
            <select name="prodi_id" id="prodi_id" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" data-jurusan="{{ $prodi->jurusan_id }}"
                        {{ old('prodi_id', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end gap-4 pt-4">
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-lg shadow transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const jurusanSelect = document.getElementById('jurusan_id');
    const prodiSelect = document.getElementById('prodi_id');
    const allProdiOptions = Array.from(prodiSelect.options);

    function filterProdi() {
        const jurusanId = jurusanSelect.value;
        prodiSelect.innerHTML = '';
        prodiSelect.appendChild(new Option('-- Pilih Prodi --', ''));
        allProdiOptions.forEach(option => {
            if (!option.value) return; // skip default
            if (option.getAttribute('data-jurusan') == jurusanId) {
                prodiSelect.appendChild(option.cloneNode(true));
            }
        });
        // Set selected if old value exists
        @if(old('prodi_id', $mahasiswa->prodi_id))
            prodiSelect.value = "{{ old('prodi_id', $mahasiswa->prodi_id) }}";
        @endif
    }

    jurusanSelect.addEventListener('change', filterProdi);

    // Jalankan saat halaman pertama kali dibuka
    filterProdi();
});
</script>
@endpush
@endsection
