@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-8">
    <div class="bg-red-300 p-8 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-8 text-gray-800 text-center">Edit Jadwal</h1>

        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-5 py-4 rounded shadow">
                <strong class="font-semibold">Oops!</strong>
                <span class="block mt-1">Ada beberapa masalah dengan input Anda:</span>
                <ul class="list-disc list-inside mt-3 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="jurusan_id" class="block mb-2 font-semibold text-gray-700">Jurusan</label>
                    <select name="jurusan_id" id="jurusan_id" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}"
                                {{ old('jurusan_id', $jadwal->jurusan_id) == $jurusan->id ? 'selected' : '' }}>
                                {{ $jurusan->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('jurusan_id')
                        <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="prodi_id" class="block mb-2 font-semibold text-gray-700">Prodi</label>
                    <select name="prodi_id" id="prodi_id" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">-- Pilih Prodi --</option>
                        @foreach($prodis as $prodi)
                            <option value="{{ $prodi->id }}"
                                data-jurusan="{{ $prodi->jurusan_id }}"
                                {{ old('prodi_id', $jadwal->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                {{ $prodi->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('prodi_id')
                        <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="dosen_id" class="block mb-2 font-semibold text-gray-700">Dosen</label>
                    <select name="dosen_id" id="dosen_id" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">-- Pilih Dosen --</option>
                        @foreach($dosens as $dosen)
                            <option value="{{ $dosen->id }}"
                                data-prodi="{{ $dosen->prodi_id }}"
                                {{ old('dosen_id', $jadwal->dosen_id) == $dosen->id ? 'selected' : '' }}>
                                {{ $dosen->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('dosen_id')
                        <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mata_kuliah_id" class="block mb-2 font-semibold text-gray-700">Mata Kuliah</label>
                    <select name="mata_kuliah_id" id="mata_kuliah_id" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach($matakuliahs as $mk)
                            <option value="{{ $mk->id }}"
                                data-dosen="{{ $mk->dosen_id }}"
                                data-prodi="{{ $mk->prodi_id }}"
                                {{ old('mata_kuliah_id', $jadwal->mata_kuliah_id) == $mk->id ? 'selected' : '' }}>
                                {{ $mk->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('mata_kuliah_id')
                        <p class="mt-1 text-red-600 text-sm italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hari" class="block mb-2 font-semibold text-gray-700">Hari</label>
                    <select name="hari" id="hari" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Hari --</option>
                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                            <option value="{{ $day }}" {{ old('hari', $jadwal->hari) == $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                    @error('hari')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="jam_mulai" class="block mb-2 font-semibold text-gray-700">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai" required
                        value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('jam_mulai')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="jam_selesai" class="block mb-2 font-semibold text-gray-700">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai" required
                        value="{{ old('jam_selesai', $jadwal->jam_selesai) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('jam_selesai')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label for="ruangan" class="block mb-2 font-semibold text-gray-700">Ruangan</label>
                    <input type="text" name="ruangan" id="ruangan" required
                        value="{{ old('ruangan', $jadwal->ruangan) }}"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('ruangan')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex justify-between items-center pt-6">
                <a href="{{ route('admin.jadwal.index') }}"
                    class="text-gray-600 hover:text-gray-800 font-semibold">
                    Batal
                </a>
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded shadow transition duration-150 ease-in-out">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const jurusanSelect = document.getElementById('jurusan_id');
    const prodiSelect = document.getElementById('prodi_id');
    const dosenSelect = document.getElementById('dosen_id');
    const matkulSelect = document.getElementById('mata_kuliah_id');

    const allProdiOptions = Array.from(prodiSelect.options);
    const allDosenOptions = Array.from(dosenSelect.options);
    const allMatkulOptions = Array.from(matkulSelect.options);

    function reloadOptions(selectElement, options, filterFn, selectedValue) {
        selectElement.innerHTML = '';

        const emptyOption = document.createElement('option');
        emptyOption.value = '';
        emptyOption.textContent = '-- Pilih --';
        selectElement.appendChild(emptyOption);

        options.forEach(option => {
            if (filterFn(option)) {
                selectElement.appendChild(option.cloneNode(true));
            }
        });

        if (selectedValue) {
            selectElement.value = selectedValue;
        }
    }

    jurusanSelect.addEventListener('change', function () {
        const jurusanId = this.value;

        reloadOptions(prodiSelect, allProdiOptions,
            option => option.value === '' || option.getAttribute('data-jurusan') === jurusanId,
            ''
        );

        reloadOptions(dosenSelect, allDosenOptions, () => false, '');
        reloadOptions(matkulSelect, allMatkulOptions, () => false, '');
    });

    prodiSelect.addEventListener('change', function () {
        const prodiId = this.value;

        reloadOptions(dosenSelect, allDosenOptions,
            option => option.value === '' || option.getAttribute('data-prodi') === prodiId,
            ''
        );

        reloadOptions(matkulSelect, allMatkulOptions, () => false, '');
    });

    dosenSelect.addEventListener('change', function () {
        const dosenId = this.value;

        reloadOptions(matkulSelect, allMatkulOptions,
            option => option.value === '' || option.getAttribute('data-dosen') === dosenId,
            ''
        );
    });

    // Inisialisasi saat halaman load untuk set pilihan lama
    function initSelects() {
        const oldJurusan = jurusanSelect.value;
        const oldProdi = prodiSelect.value;
        const oldDosen = dosenSelect.value;
        const oldMatkul = matkulSelect.value;

        if (oldJurusan) {
            reloadOptions(prodiSelect, allProdiOptions,
                option => option.value === '' || option.getAttribute('data-jurusan') === oldJurusan,
                oldProdi
            );

            if (oldProdi) {
                reloadOptions(dosenSelect, allDosenOptions,
                    option => option.value === '' || option.getAttribute('data-prodi') === oldProdi,
                    oldDosen
                );

                if (oldDosen) {
                    reloadOptions(matkulSelect, allMatkulOptions,
                        option => option.value === '' || option.getAttribute('data-dosen') === oldDosen,
                        oldMatkul
                    );
                }
            }
        }
    }

    initSelects();
});
</script>
@endsection
