@extends('layouts.mahasiswa')

@section('content')
<h2 class="text-xl font-bold mb-4">Kartu Rencana Studi (KRS)</h2>

@if(session('success'))
    <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
@endif

<a href="{{ route('mahasiswa.krs.create') }}" 
   class="inline-block mb-4 px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">
    Tambah KRS
</a>

@if ($krsList->isEmpty())
    <p>Belum ada mata kuliah yang diambil.</p>
@else
    <table class="w-full border border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">Kode</th>
            <th class="border px-4 py-2">Nama Mata Kuliah</th>
            <th class="border px-4 py-2">SKS</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($krsList as $krs)
            <tr>
                <td class="border px-4 py-2">{{ $krs->mataKuliah->kode }}</td>
                <td class="border px-4 py-2">{{ $krs->mataKuliah->nama }}</td>
                <td class="border px-4 py-2">{{ $krs->mataKuliah->sks }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('mahasiswa.krs.edit', $krs) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('mahasiswa.krs.destroy', $krs) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin hapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endif
@endsection
