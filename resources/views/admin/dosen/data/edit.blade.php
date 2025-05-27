@extends('layouts.admin')

@section('content')


<div class="max-w-4xl mx-auto mt-10 px-4">
    <div class="bg-red-300 p-8 rounded-2xl shadow-lg border border-gray-200">
        <h1 class="text-3xl font-bold text-center text-white mb-8">Edit Data Dosen</h1>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-700 px-5 py-4 rounded-lg mb-6">
                <strong class="block font-semibold">Terdapat kesalahan:</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dosen.data.update', $dosen->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="nidn" class="block text-sm font-semibold text-gray-700 mb-1">NIDN</label>
                <input type="text" name="nidn" id="nidn" value="{{ old('nidn', $dosen->nidn) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-rose-500 transition"
                    placeholder="Masukkan NIDN dosen">
                @error('nidn')
                    <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $dosen->nama) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-rose-500 transition"
                    placeholder="Masukkan nama dosen">
                @error('nama')
                    <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $dosen->email) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-rose-500 transition"
                    placeholder="Masukkan email dosen">
                @error('email')
                    <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jurusan_id" class="block text-sm font-semibold text-gray-700 mb-1">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-rose-500 transition">
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}"
                            {{ old('jurusan_id', $dosen->prodi->jurusan_id ?? '') == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="prodi_id" class="block text-sm font-semibold text-gray-700 mb-1">Program Studi</label>
                <select name="prodi_id" id="prodi_id" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-rose-500 transition">
                    <option value="">-- Pilih Program Studi --</option>
                    {{-- Diisi via JavaScript --}}
                </select>
            </div>

            <div class="pt-6 flex flex-col items-center">
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-3 rounded-lg shadow transition duration-200 w-full max-w-xs">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.dosen.data.index') }}"
                    class="mt-3 text-gray-600 hover:text-rose-600 transition text-sm font-semibold">
                    ← Kembali ke daftar dosen
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
