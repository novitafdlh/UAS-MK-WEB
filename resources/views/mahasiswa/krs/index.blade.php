@extends('layouts.mahasiswa')

@section('content')
<main class="mt-12 min-h-screen p-10 bg-white rounded-xl shadow-md">
    {{-- Judul --}}
    <h2 class="text-3xl font-bold text-red-700 mb-6">📚 Kartu Rencana Studi (KRS)</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah KRS --}}
    <a href="{{ route('mahasiswa.krs.create') }}" 
       class="inline-block mb-6 px-5 py-2 bg-red-600 text-white font-medium rounded-lg shadow hover:bg-red-700 transition duration-200">
        ➕ Tambah KRS
    </a>

    {{-- Tabel KRS --}}
    @if ($krsList->isEmpty())
        <p class="text-gray-600">Belum ada mata kuliah yang diambil.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Kode</th>
                        <th class="px-4 py-3 text-left">Nama Mata Kuliah</th>
                        <th class="px-4 py-3 text-left">SKS</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 bg-white">
                    @foreach ($krsList as $krs)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $krs->mataKuliah->kode }}</td>
                            <td class="px-4 py-2">{{ $krs->mataKuliah->nama }}</td>
                            <td class="px-4 py-2">{{ $krs->mataKuliah->sks }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('mahasiswa.krs.edit', $krs) }}" 
                                   class="text-blue-600 hover:underline mr-3">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('mahasiswa.krs.destroy', $krs) }}" 
                                      method="POST" 
                                      class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</main>
@endsection
