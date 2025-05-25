@extends('layouts.admin')

@section('title', 'Daftar Jadwal')

@section('content')
<div class="max-w-7xl mx-auto mt-6 px-4">
    {{-- Background logo Untad besar pudar --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none z-0">
        <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad"
            class="opacity-10 max-w-sm sm:max-w-lg lg:max-w-xl absolute top-1/2 left-1/2"
            style="user-select: none; transform: translate(-25%, -48%);" />
    </div>
    
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Jadwal</h1>
        <a href="{{ route('admin.jadwal.create') }}"
           class="px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 transition shadow">
            + Tambah Jadwal
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded shadow relative" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button onclick="this.parentElement.style.display='none';"
                    class="absolute top-2 right-2 text-green-500 hover:text-green-700">
                &times;
            </button>
        </div>
    @endif

    {{-- Tabel Jadwal --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto divide-y divide-gray-200">
            <thead class="bg-red-100 text-red-900">
                <tr>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">ID</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">Prodi</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">Mata Kuliah</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">Dosen</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">Hari</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">Jam Mulai</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">Jam Selesai</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase">Ruangan</th>
                    <th class="px-6 py-3 text-xs font-semibold uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($jadwals as $jadwal)
                    <tr class="hover:bg-red-50">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->prodi->nama ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->mata_kuliah->nama ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->dosen->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->hari }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $jadwal->ruangan }}</td>
                        <td class="px-6 py-4 text-sm text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
                                   class="px-3 py-1.5 text-xs font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded shadow">
                                    Edit
                                </a>
                                <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus jadwal ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1.5 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded shadow">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-6 text-center text-sm text-gray-500 italic">
                            Tidak ada jadwal ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
