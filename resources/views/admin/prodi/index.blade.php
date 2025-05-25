@extends('layouts.admin')

@section('title', 'Daftar Program Studi')

@section('content')
<div class="max-w-5xl mx-auto mt-6 px-4">
    {{-- Background logo Untad besar pudar --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none z-0">
        <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad"
            class="opacity-10 max-w-sm sm:max-w-lg lg:max-w-xl absolute top-1/2 left-1/2"
            style="user-select: none; transform: translate(-25%, -48%);" />
    </div>
    
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Program Studi</h1>
        <a href="{{ route('admin.prodi.create') }}"
           class="px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 shadow transition">
            + Tambah Prodi
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="mb-5 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Prodi --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full table-auto divide-y divide-gray-200">
            <thead class="bg-red-100 text-red-900">
                <tr>
                    <th class="px-5 py-3 text-xs font-semibold uppercase">No</th>
                    <th class="px-5 py-3 text-xs font-semibold uppercase">Jurusan</th>
                    <th class="px-5 py-3 text-xs font-semibold uppercase">Nama Prodi</th>
                    <th class="px-5 py-3 text-xs font-semibold uppercase text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($prodi as $index => $item)
                    <tr class="hover:bg-red-50 transition">
                        <td class="px-5 py-3 text-sm text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-5 py-3 text-sm text-gray-800">{{ $item->jurusan->nama ?? '-' }}</td>
                        <td class="px-5 py-3 text-sm text-gray-800">{{ $item->nama }}</td>
                        <td class="px-5 py-3 text-sm text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.prodi.edit', $item->id) }}"
                                   class="px-3 py-1.5 text-xs font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded shadow">
                                    Edit
                                </a>
                                <form action="{{ route('admin.prodi.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus prodi ini?');">
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
                        <td colspan="4" class="px-5 py-6 text-center text-gray-500 italic">
                            😕 Belum ada data prodi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
