@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    {{-- Judul & Tombol --}}
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-rose-1500">📋 Data Dosen</h1>
        <a href="{{ route('admin.dosen.data.create') }}"
           class="inline-flex items-center bg-red-600 hover:bg-red-600 text-white font-medium px-5 py-2 rounded-lg shadow transition duration-200">
            + Tambah Dosen
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-5 py-4 rounded-lg shadow relative">
            <div class="flex justify-between items-center">
                <div>
                    <strong class="font-semibold">Sukses!</strong>
                    <span class="ml-2">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.parentElement.remove();" class="text-green-600 hover:text-green-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414
                              1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293
                              4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Tabel Dosen --}}
    <div class="overflow-x-auto rounded-xl shadow-lg bg-white border border-gray-200">
        <table class="min-w-full text-sm text-black">
            <thead class="bg-red-600 text-rose-900 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">NIDN</th>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Jurusan</th>
                    <th class="px-6 py-4 text-left">Prodi</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($dosens as $dosen)
                <tr class="hover:bg-rose-50 transition duration-150">
                    <td class="px-6 py-4">{{ $dosen->nidn }}</td>
                    <td class="px-6 py-4">{{ $dosen->nama }}</td>
                    <td class="px-6 py-4">{{ $dosen->email }}</td>
                    <td class="px-6 py-4">{{ $dosen->prodi->jurusan->nama ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $dosen->prodi->nama ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-2">
                            {{-- Edit --}}
                            <a href="{{ route('admin.dosen.data.edit', $dosen->id) }}"
                               class="inline-block bg-red-500 hover:bg-red-500 text-white px-3 py-1.5 rounded text-xs font-medium shadow">
                                ✏️ Edit
                            </a>
                            {{-- Hapus --}}
                            <form action="{{ route('admin.dosen.data.destroy', $dosen->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-block bg-red-500 hover:bg-red-500 text-white px-3 py-1.5 rounded text-xs font-medium shadow">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 italic px-6 py-6">
                        Belum ada data dosen.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
