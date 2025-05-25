@extends('layouts.admin')

@section('title', 'Data Jurusan')

@section('content')
<div class="max-w-5xl mx-auto mt-6 px-4">
    {{-- Background logo Untad besar pudar --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none z-0">
        <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad"
            class="opacity-10 max-w-sm sm:max-w-lg lg:max-w-xl absolute top-1/2 left-1/2"
            style="user-select: none; transform: translate(-25%, -48%);" />
    </div>
    
    {{-- Judul Halaman --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Data Jurusan</h1>
        <a href="{{ route('admin.jurusan.create') }}"
           class="px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 shadow transition">
            + Tambah Jurusan
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="mb-5 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel Jurusan --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full table-auto divide-y divide-gray-200">
            <thead class="bg-red-100 text-red-900">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-center uppercase">Nama</th>
                    <th class="px-5 py-3 text-center text-xs font-semibold uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($jurusans as $item)
                <tr class="hover:bg-red-50 transition">
                    <td class="px-5 py-3 text-sm text-gray-800">{{ $item->nama }}</td>
                    <td class="px-5 py-3 text-sm text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.jurusan.edit', $item->id) }}"
                               class="inline-block px-3 py-1.5 text-xs font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded shadow">
                                Edit
                            </a>
                            <form action="{{ route('admin.jurusan.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-block px-3 py-1.5 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded shadow">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="px-5 py-6 text-center text-gray-500 italic">😕 Belum ada data jurusan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
