@extends('layouts.admin')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="relative max-w-6xl mx-auto px-4 py-6">

    {{-- Background logo Untad besar pudar --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none z-0">
        <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad"
          class="opacity-10 max-w-sm sm:max-w-lg lg:max-w-xl transform translate-y-52"
            style="user-select: none;"
        />
    </div>


    {{-- Judul Halaman --}}
    <div class="flex items-center justify-between mb-6 relative z-10">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Mahasiswa</h1>
        <a href="{{ route('admin.mahasiswa.data.create') }}"
           class="px-5 py-2 bg-red-700 text-white font-medium rounded-lg hover:bg-red-800 shadow transition duration-150">
            + Tambah Mahasiswa
        </a>
    </div>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5 shadow relative z-10">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                <svg class="fill-current h-6 w-6 text-green-500" viewBox="0 0 20 20"><path
                    d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 11.819l-2.651 3.03a1.2 1.2 0 01-1.697-1.698l2.758-3.15-2.758-3.15A1.2 1.2 0 017.349 5.12L10 8.183l2.651-3.063a1.2 1.2 0 111.697 1.697l-2.758 3.15 2.758 3.15a1.2 1.2 0 010 1.698z"/></svg>
            </button>
        </div>
    @endif

    {{-- Tabel Data Mahasiswa --}}
    <div class="overflow-x-auto bg-white border rounded-xl shadow relative z-10">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-red-100 text-red-900">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase">NIM</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Nama</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Email</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Prodi</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Jurusan</th>
                    <th class="px-5 py-3 text-center text-xs font-semibold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($mahasiswa as $mhs)
                <tr class="hover:bg-red-50 transition">
                    <td class="px-5 py-3 text-sm text-gray-800">{{ $mhs->nim }}</td>
                    <td class="px-5 py-3 text-sm text-gray-800">{{ $mhs->nama }}</td>
                    <td class="px-5 py-3 text-sm text-gray-800">{{ $mhs->email }}</td>
                    <td class="px-5 py-3 text-sm text-gray-800">{{ $mhs->prodi->nama ?? '-' }}</td>
                    <td class="px-5 py-3 text-sm text-gray-800">{{ $mhs->jurusan->nama ?? '-' }}</td>
                    <td class="px-5 py-3 text-sm text-center">
                        <div class="flex items-center justify-center gap-2">
                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.mahasiswa.data.edit', $mhs->id) }}"
                               class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded shadow">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414
                                          a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.mahasiswa.data.destroy', $mhs->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded shadow">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7
                                              m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-6 text-center text-gray-500 italic">😕 Belum ada data mahasiswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
