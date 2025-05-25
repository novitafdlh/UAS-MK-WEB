@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="mb-12 max-w-lg mx-auto p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg shadow">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-md">
        <h1 class="mb-6 text-3xl font-bold text-center text-red-700">Tambah Mahasiswa</h1>

        <form action="{{ route('admin.mahasiswa.data.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nim" class="block text-sm font-semibold text-gray-700 mb-1">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ old('nim') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <div>
                <label for="jurusan" class="block text-sm font-semibold text-gray-700 mb-1">Jurusan</label>
                <select name="jurusan_id" id="jurusan" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="prodi" class="block text-sm font-semibold text-gray-700 mb-1">Program Studi</label>
                <select name="prodi_id" id="prodi" disabled 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
                    <option value="">-- Pilih Prodi --</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <script>
        const jurusanSelect = document.getElementById('jurusan');
        const prodiSelect = document.getElementById('prodi');

        const jurusanProdiMap = @json($jurusans->mapWithKeys(function($jurusan) {
            return [$jurusan->id => $jurusan->prodis->map(fn($p) => ['id' => $p->id, 'nama' => $p->nama])];
        }));

        jurusanSelect.addEventListener('change', function () {
            const selectedJurusanId = this.value;
            const prodis = jurusanProdiMap[selectedJurusanId] || [];

            prodiSelect.innerHTML = '<option value="">-- Pilih Prodi --</option>';
            prodis.forEach(prodi => {
                const option = document.createElement('option');
                option.value = prodi.id;
                option.textContent = prodi.nama;
                prodiSelect.appendChild(option);
            });

            prodiSelect.disabled = prodis.length === 0;
        });
    </script>
@endsection
