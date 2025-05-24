@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Data Jurusan</h1>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-2 rounded">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.jurusan.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Tambah Jurusan
    </a>

    <table class="w-full table-auto bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jurusan as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->nama }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.jurusan.edit', $item->id) }}" class="px-2 py-1 bg-yellow-500 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('admin.jurusan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus jurusan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
