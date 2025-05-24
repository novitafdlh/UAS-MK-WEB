@extends('layouts.admin')

@section('content')
<h1>Daftar Matakuliah</h1>

<a href="{{ route('admin.matakuliah.create') }}">Tambah Matakuliah</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matakuliahs as $matakuliah)
        <tr>
            <td>{{ $matakuliah->kode }}</td>
            <td>{{ $matakuliah->nama }}</td>
            <td>{{ $matakuliah->sks }}</td>
            <td>{{ $matakuliah->jurusan }}</td>
            <td>
                <a href="{{ route('admin.matakuliah.edit', $matakuliah->id) }}">Edit</a>
                <form action="{{ route('admin.matakuliah.destroy', $matakuliah->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
