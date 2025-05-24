@extends('layouts.admin')

@section('content')
<h1>Daftar Dosen</h1>

<a href="{{ route('admin.dosen.data.create') }}">Tambah Dosen</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dosens as $dosen)
        <tr>
            <td>{{ $dosen->nidn }}</td>
            <td>{{ $dosen->nama }}</td>
            <td>{{ $dosen->email }}</td>
            <td>{{ $dosen->jurusan }}</td>
            <td>
                <a href="{{ route('admin.dosen.data.edit', $dosen->id) }}">Edit</a>
                <form action="{{ route('admin.dosen.data.destroy', $dosen->id) }}" method="POST" style="display:inline;">
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
