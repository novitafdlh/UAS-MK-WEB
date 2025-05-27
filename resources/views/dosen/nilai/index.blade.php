@extends('layouts.dosen')

@section('title', 'Nilai Mahasiswa')

@section('content')
    <div class="mb-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-red-600 to-rose-400 bg-clip-text text-transparent">
                Daftar Nilai Mahasiswa
            </h1>
            <p class="text-gray-600">Lihat dan kelola data nilai mahasiswa</p>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Prodi + Button Input Nilai -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <form method="GET" action="{{ route('dosen.nilai.index') }}" class="flex gap-3 items-center w-full md:w-auto">
                <label for="prodi_id" class="text-gray-700 font-medium">Pilih Prodi:</label>
                <select name="prodi_id" id="prodi_id" onchange="this.form.submit()"
                    class="w-full md:w-64 border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-rose-400">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach($prodis as $prodi)
                        <option value="{{ $prodi->id }}" {{ request('prodi_id') == $prodi->id ? 'selected' : '' }}>
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
            </form>

            <a href="{{ route('dosen.nilai.create') }}" 
               class="bg-rose-600 hover:bg-rose-700 transition text-white font-semibold px-6 py-2 rounded-lg shadow text-center">
               + Input Nilai
            </a>
        </div>

        <!-- Table Nilai -->
        @if(count($nilaiList) > 0)
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-rose-600 text-white text-left text-sm uppercase">
                        <tr>
                            <th class="px-6 py-3 border-r border-rose-700">Mahasiswa</th>
                            <th class="px-6 py-3 border-r border-rose-700">Mata Kuliah</th>
                            <th class="px-6 py-3">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        @foreach($nilaiList as $item)
                            <tr class="hover:bg-rose-50 transition">
                                <td class="px-6 py-4 border-r border-gray-200">{{ $item->mahasiswa->nama }}</td>
                                <td class="px-6 py-4 border-r border-gray-200">{{ $item->mataKuliah->nama }}</td>
                                <td class="px-6 py-4">{{ $item->nilai ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-500 italic mt-10">
                Belum ada data nilai yang diinput.
            </p>
        @endif
    </div>
@endsection
