@extends('layouts.admin')

@section('title', 'Edit Dosen')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Dosen</h1>
        <a href="{{ route('admin.dosen.index') }}" class="text-red-600 hover:underline text-sm">&larr; Kembali ke Data Dosen</a>
    </div>

    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6 max-w-lg mx-auto">
        <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label for="nidn" class="block text-sm font-medium text-gray-700 mb-1">NIDN</label>
                <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $dosen->nidn) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-rose-400 focus:border-rose-400">
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $dosen->name) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-rose-400 focus:border-rose-400">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $dosen->email) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-rose-400 focus:border-rose-400">
            </div>
            <div>
                <label for="jurusan_id" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-rose-400 focus:border-rose-400">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $dosen->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="prodi_id" class="block text-sm font-medium text-gray-700 mb-1">Prodi</label>
                <select name="prodi_id" id="prodi_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-rose-400 focus:border-rose-400">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach($jurusans as $jurusan)
                        @foreach($jurusan->prodis as $prodi)
                            <option value="{{ $prodi->id }}" data-jurusan="{{ $jurusan->id }}"
                                {{ old('prodi_id', $dosen->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-gray-400 text-xs">(Kosongkan jika tidak diubah)</span></label>
                <input type="password" name="password" id="password"
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-rose-400 focus:border-rose-400">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-rose-400 focus:border-rose-400">
            </div>
            <div class="pt-2">
                <button type="submit"
                        class="w-full py-2 px-4 bg-gradient-to-r from-rose-600 to-red-600 text-white rounded-lg shadow hover:scale-105 transition-all">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const jurusanSelect = document.getElementById('jurusan_id');
    const prodiSelect = document.getElementById('prodi_id');
    const allProdiOptions = Array.from(prodiSelect.options);

    function filterProdi() {
        const jurusanId = jurusanSelect.value;
        prodiSelect.innerHTML = '';
        allProdiOptions.forEach(option => {
            if (option.value === "" || option.getAttribute('data-jurusan') === jurusanId) {
                prodiSelect.appendChild(option.cloneNode(true));
            }
        });
        // Pilih kembali prodi jika ada old value
        @if(old('prodi_id', $dosen->prodi_id))
            prodiSelect.value = "{{ old('prodi_id', $dosen->prodi_id) }}";
        @endif
    }

    jurusanSelect.addEventListener('change', filterProdi);

    // Trigger filter saat halaman edit dibuka
    if (jurusanSelect.value) {
        filterProdi();
    }
});
</script>
@endsection