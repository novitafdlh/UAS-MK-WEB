@extends('layouts.admin')

@section('content')
    <h1 class="mb-4 text-xl font-semibold">Tambah Mahasiswa</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.mahasiswa.data.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nim" class="block font-medium">NIM:</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="nama" class="block font-medium">Nama:</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="email" class="block font-medium">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label for="jurusan" class="block font-medium">Jurusan:</label>
            <select name="jurusan_id" id="jurusan" class="w-full p-2 border rounded">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="prodi" class="block font-medium">Program Studi:</label>
            <select name="prodi_id" id="prodi" class="w-full p-2 border rounded" disabled>
                <option value="">-- Pilih Prodi --</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
    </form>

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
