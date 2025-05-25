@extends('layouts.dosen')

@section('title', 'Nilai Mahasiswa')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-800">Daftar Nilai Mahasiswa</h1>
        <a href="{{ route('dosen.nilai.create') }}" 
           class="bg-teal-600 hover:bg-teal-700 transition text-white px-5 py-2 rounded shadow">
           + Input Nilai
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(count($nilaiList) > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 rounded-md shadow-sm">
                <thead class="bg-teal-600 text-white">
                    <tr>
                        <th class="px-6 py-3 border-r border-teal-700 text-left">Mahasiswa</th>
                        <th class="px-6 py-3 border-r border-teal-700 text-left">Mata Kuliah</th>
                        <th class="px-6 py-3 text-left">Nilai</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($nilaiList as $item)
                        <tr class="hover:bg-teal-50 transition">
                            <td class="px-6 py-4 border-r border-gray-300">{{ $item->mahasiswa->name }}</td>
                            <td class="px-6 py-4 border-r border-gray-300">{{ $item->mataKuliah->nama }}</td>
                            <td class="px-6 py-4">{{ $item->nilai ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-500 italic mt-10">Belum ada data nilai yang diinput.</p>
    @endif
@endsection
