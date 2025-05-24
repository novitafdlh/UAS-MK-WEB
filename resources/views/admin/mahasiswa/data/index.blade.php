@extends('layouts.admin')

@section('content')
<h1>Daftar Mahasiswa</h1>
<a href="{{ route('admin.mahasiswa.data.create') }}">+ Tambah Mahasiswa</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswa as $mhs)
        <tr>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->email }}</td>
            <td>{{ $mhs->prodi }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>
                <a href="{{ route('admin.mahasiswa.edit', $mhs) }}">Edit</a>
                <form action="{{ route('admin.mahasiswa.destroy', $mhs) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
