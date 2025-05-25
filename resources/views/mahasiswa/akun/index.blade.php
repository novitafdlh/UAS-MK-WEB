@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h3>Daftar Akun Mahasiswa</h3>
    <a href="{{ route('mahasiswa.akun.create') }}" class="btn btn-primary mb-3">Tambah Akun</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
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
            @foreach($akuns as $akun)
            <tr>
                <td>{{ $akun->nim }}</td>
                <td>{{ $akun->nama }}</td>
                <td>{{ $akun->email }}</td>
                <td>{{ $akun->prodi->nama ?? '-' }}</td>
                <td>{{ $akun->jurusan->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('mahasiswa.akun.edit', $akun->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('mahasiswa.akun.destroy', $akun->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection