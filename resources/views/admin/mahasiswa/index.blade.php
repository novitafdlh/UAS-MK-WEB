@extends('layouts.admin')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Mahasiswa</h1>
        <a href="{{ route('admin.mahasiswa.create') }}"
           class="inline-block px-6 py-2 bg-gradient-to-r from-rose-600 to-red-600 text-white rounded-lg shadow hover:scale-105 transition-all">
            + Tambah Mahasiswa
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow p-6 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-rose-100 text-gray-700">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">NIM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Prodi</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $mhs)
                    <tr class="border-b hover:bg-rose-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $mhs->nim }}</td>
                        <td class="px-4 py-2">{{ $mhs->name }}</td>
                        <td class="px-4 py-2">{{ $mhs->email }}</td>
                        <td class="px-4 py-2">{{ $mhs->jurusan->nama ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $mhs->prodi->nama ?? '-' }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('admin.mahasiswa.edit', $mhs->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-sm">Edit</a>
                            <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data mahasiswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection