@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8"> {{-- Container utama dengan padding dan margin --}}
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Jadwal</h1> {{-- Judul halaman --}}

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
            <ul class="mt-3 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-md"> {{-- Kartu form --}}
        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting untuk HTTP PUT request --}}

            <div class="mb-4"> {{-- mb-3 menjadi mb-4 --}}
                <label for="prodi_id" class="block text-gray-700 text-sm font-bold mb-2">Prodi</label> {{-- form-label --}}
                <select name="prodi_id" id="prodi_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required> {{-- form-select --}}
                    <option value="">-- Pilih Prodi --</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi->id }}" {{ (old('prodi_id', $jadwal->prodi_id) == $prodi->id) ? 'selected' : '' }}>
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
                @error('prodi_id')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="mata_kuliah_id" class="block text-gray-700 text-sm font-bold mb-2">Mata Kuliah</label>
                <select name="mata_kuliah_id" id="mata_kuliah_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach($matakuliahs as $mk)
                        <option value="{{ $mk->id }}" {{ (old('mata_kuliah_id', $jadwal->mata_kuliah_id) == $mk->id) ? 'selected' : '' }}>
                            {{ $mk->nama }}
                        </option>
                    @endforeach
                </select>
                @error('mata_kuliah_id')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="dosen_id" class="block text-gray-700 text-sm font-bold mb-2">Dosen</label>
                <select name="dosen_id" id="dosen_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($dosens as $dosen)
                        <option value="{{ $dosen->id }}" {{ (old('dosen_id', $jadwal->dosen_id) == $dosen->id) ? 'selected' : '' }}>
                            {{ $dosen->name }}
                        </option>
                    @endforeach
                </select>
                @error('dosen_id')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="hari" class="block text-gray-700 text-sm font-bold mb-2">Hari</label>
                <select name="hari" id="hari" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">-- Pilih Hari --</option>
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                        <option value="{{ $day }}" {{ old('hari', $jadwal->hari) == $day ? 'selected' : '' }}>
                            {{ $day }}
                        </option>
                    @endforeach
                </select>
                @error('hari')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label for="jam_mulai" class="block text-gray-700 text-sm font-bold mb-2">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required>
                @error('jam_mulai')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6"> {{-- mb-3 menjadi mb-6 untuk spasi lebih --}}
                <label for="jam_selesai" class="block text-gray-700 text-sm font-bold mb-2">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" required>
                @error('jam_selesai')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
            </div>
            
            <div class="mb-6"> {{-- mb-3 menjadi mb-6 untuk spasi lebih --}}
                <label for="ruangan" class="block text-gray-700 text-sm font-bold mb-2">Ruangan</label>
                <input type="text" name="ruangan" id="ruangan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ old('ruangan', $jadwal->ruangan) }}" required>
                @error('ruangan')<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.jadwal.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Batal
                </a> {{-- btn btn-secondary --}}
            </div>
        </form>
    </div>
</div>
@endsection