@extends('layouts.mahasiswa')

@section('title', 'Edit Data Mahasiswa')

@section('content')
<main class="flex-1 p-4 md:p-6 bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent mb-2">
                    Edit Data Pribadi
                </h1>
                <p class="text-gray-600">Perbarui informasi akun Anda</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('mahasiswa.akun.index') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-gray-600 hover:to-gray-700 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Profil
                </a>
            </div>
        </div>
        <div class="w-24 h-1 bg-gradient-to-r from-dark-blue-400 to-red-accent-500 rounded-full mt-4"></div>
    </div>

    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-md border border-dark-blue-100">
        <h2 class="text-2xl font-bold mb-6 text-center bg-gradient-to-r from-dark-blue-600 to-red-accent-600 bg-clip-text text-transparent">
            Form Edit Profil
        </h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('mahasiswa.akun.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nim" class="block mb-2 font-semibold text-gray-700">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" required
                    class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white">
            </div>

            <div>
                <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa->name) }}" required
                    class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white">
            </div>

            <div>
                <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $mahasiswa->email) }}" required
                    class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white">
            </div>

            <div>
                <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" required
                    class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white">
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
                    class="w-full px-4 py-2 border border-dark-blue-200 rounded-lg focus:ring-2 focus:ring-dark-blue-500 focus:outline-none bg-white">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi->id }}" data-jurusan="{{ $prodi->jurusan_id }}"
                            {{ old('prodi_id', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-dark-blue-500 to-red-accent-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-dark-blue-600 hover:to-red-accent-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</main>
@endsection

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
            if (!option.value) return;
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
    filterProdi();
});
</script>
@endpush