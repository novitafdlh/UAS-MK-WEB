@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Matakuliah</h1>
        <a href="{{ route('admin.matakuliah.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Tambah Matakuliah
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border-b text-left">Kode</th>
                    <th class="px-4 py-2 border-b text-left">Nama</th>
                    <th class="px-4 py-2 border-b text-left">SKS</th>
                    <th class="px-4 py-2 border-b text-left">Jurusan</th>
                    <th class="px-4 py-2 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matakuliahs as $matakuliah)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $matakuliah->kode }}</td>
                    <td class="px-4 py-2 border-b">{{ $matakuliah->nama }}</td>
                    <td class="px-4 py-2 border-b">{{ $matakuliah->sks }}</td>
                    <td class="px-4 py-2 border-b">{{ $matakuliah->jurusan }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('admin.matakuliah.edit', $matakuliah->id) }}"
                           class="inline-block text-blue-600 hover:underline mr-2">Edit</a>

                        <form action="{{ route('admin.matakuliah.destroy', $matakuliah->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
