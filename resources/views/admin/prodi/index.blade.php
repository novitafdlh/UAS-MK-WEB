@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto mt-6">
    <h1 class="text-2xl font-semibold mb-4">Daftar Program Studi</h1>

    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-700 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.prodi.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        + Tambah Prodi
    </a>

    <div class="overflow-x-auto">
        <table class="w-full text-left bg-white border shadow rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 w-12">No</th>
                    <th class="border px-4 py-2">Jurusan</th>
                    <th class="border px-4 py-2">Nama Prodi</th>
                    <th class="border px-4 py-2 w-36">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prodi as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $item->jurusan->nama ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $item->nama }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('admin.prodi.edit', $item->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">Edit</a>

                            <form action="{{ route('admin.prodi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus prodi ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center text-gray-500">Belum ada data prodi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
