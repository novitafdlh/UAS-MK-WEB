@extends('layouts.mahasiswa')

@section('content')
    <h2 class="text-xl font-bold mb-4">Riwayat KRS</h2>

    @if ($krsList->isEmpty())
        <p>Kamu belum mengambil mata kuliah apa pun.</p>
    @else
        <table class="w-full table-auto border border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Kode</th>
                    <th class="border px-4 py-2">Nama Mata Kuliah</th>
                    <th class="border px-4 py-2">SKS</th>
                    <th class="border px-4 py-2">Semester</th>
                    <th class="border px-4 py-2">Tahun Akademik</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($krsList as $krs)
                    <tr>
                        <td class="border px-4 py-2">{{ $krs->mataKuliah->kode }}</td>
                        <td class="border px-4 py-2">{{ $krs->mataKuliah->nama }}</td>
                        <td class="border px-4 py-2">{{ $krs->mataKuliah->sks }}</td>
                        <td class="border px-4 py-2">{{ $krs->semester }}</td>
                        <td class="border px-4 py-2">{{ $krs->tahun_akademik }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
