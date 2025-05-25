@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-red-700">Edit Dosen</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dosen.data.update', $dosen->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nidn" class="block font-semibold mb-1 text-gray-700">NIDN</label>
                <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $dosen->nidn) }}"
                       class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
            </div>

            <div>
                <label for="nama" class="block font-semibold mb-1 text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $dosen->nama) }}"
                       class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1 text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $dosen->email) }}"
                       class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
            </div>

            <div>
                <label for="jurusan_id" class="block font-semibold mb-1 text-gray-700">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" required
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}" {{ old('jurusan_id', $dosen->prodi->jurusan_id ?? '') == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="prodi_id" class="block font-semibold mb-1 text-gray-700">Program Studi</label>
                <select name="prodi_id" id="prodi_id" required
                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                    <option value="">-- Pilih Program Studi --</option>
                    {{-- Opsi ini akan diisi via JavaScript --}}
                </select>
            </div>

            <div class="pt-4 flex items-center justify-between">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-semibold px-4 py-2 rounded-lg shadow transition duration-200">
                    Update
                </button>
                <a href="{{ route('admin.dosen.data.index') }}" class="text-gray-600 hover:underline font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>
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

        function updateProdiOptions(selectedJurusanId, currentProdiId = null) {
            prodiSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';
            if (selectedJurusanId && allProdis[selectedJurusanId]) {
                allProdis[selectedJurusanId].forEach(prodi => {
                    const option = document.createElement('option');
                    option.value = prodi.id;
                    option.textContent = prodi.nama;
                    if (currentProdiId && currentProdiId == prodi.id) {
                        option.selected = true;
                    } else if ("{{ old('prodi_id') }}" == prodi.id) {
                        option.selected = true;
                    }
                    prodiSelect.appendChild(option);
                });
            }
        }

        jurusanSelect.addEventListener('change', function () {
            updateProdiOptions(this.value);
        });

        const initialJurusanId = "{{ old('jurusan_id', $dosen->prodi->jurusan_id ?? '') }}";
        const initialProdiId = "{{ old('prodi_id', $dosen->prodi_id ?? '') }}";
        if (initialJurusanId) {
            updateProdiOptions(initialJurusanId, initialProdiId);
        }
    });
</script>
@endsection
