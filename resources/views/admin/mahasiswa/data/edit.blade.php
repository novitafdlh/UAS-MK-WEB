@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-3xl font-bold text-center text-red-700 mb-10">Edit Mahasiswa</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.mahasiswa.data.update', $mahasiswa->id) }}" method="POST" class="space-y-5 max-w-xl mx-auto">
        @csrf
        @method('PUT')

        <div>
            <label for="nim" class="block font-medium mb-1">NIM:</label>
            <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" 
                   class="w-full p-2 border rounded" />
        </div>

        <div>
            <label for="nama" class="block font-medium mb-1">Nama:</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" 
                   class="w-full p-2 border rounded" />
        </div>

        <div>
            <label for="email" class="block font-medium mb-1">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $mahasiswa->email) }}" 
                   class="w-full p-2 border rounded" />
        </div>

        <div>
            <label for="jurusan" class="block font-medium mb-1">Jurusan:</label>
            <select name="jurusan_id" id="jurusan" class="w-full p-2 border rounded">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $mahasiswa->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="prodi" class="block font-medium mb-1">Program Studi:</label>
            <select name="prodi_id" id="prodi" class="w-full p-2 border rounded" disabled>
                <option value="">-- Pilih Prodi --</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded hover:bg-red-800 transition">
            Update
        </button>

            
    </form>

    <script>
        const jurusanSelect = document.getElementById('jurusan');
        const prodiSelect = document.getElementById('prodi');

        const jurusanProdiMap = @json($jurusans->mapWithKeys(function($jurusan) {
            return [$jurusan->id => $jurusan->prodis->map(fn($p) => ['id' => $p->id, 'nama' => $p->nama])];
        }));

        function setProdiOptions(selectedJurusanId, selectedProdiId = null) {
            const prodis = jurusanProdiMap[selectedJurusanId] || [];

            prodiSelect.innerHTML = '<option value="">-- Pilih Prodi --</option>';
            prodis.forEach(prodi => {
                const option = document.createElement('option');
                option.value = prodi.id;
                option.textContent = prodi.nama;
                if (prodi.id == selectedProdiId) {
                    option.selected = true;
                }
                prodiSelect.appendChild(option);
            });

            prodiSelect.disabled = prodis.length === 0;
        }

        jurusanSelect.addEventListener('change', function () {
            setProdiOptions(this.value);
        });

        // Set awal select prodi sesuai data mahasiswa
        document.addEventListener('DOMContentLoaded', () => {
            const selectedJurusanId = jurusanSelect.value;
            const selectedProdiId = "{{ old('prodi_id', $mahasiswa->prodi_id) }}";
            if (selectedJurusanId) {
                setProdiOptions(selectedJurusanId, selectedProdiId);
            }
        });
    </script>
</div>
@endsection
