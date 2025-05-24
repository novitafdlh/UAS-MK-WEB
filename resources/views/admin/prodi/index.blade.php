@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Program Studi</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.prodi.create') }}" class="btn btn-primary mb-3">+ Tambah Prodi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jurusan</th>
                <th>Nama Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prodi as $index => $prodi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $prodi->jurusan->nama ?? '-' }}</td>
                    <td>{{ $prodi->nama }}</td>
                    <td>
                        <a href="{{ route('admin.prodi.edit', $prodi->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.prodi.destroy', $prodi->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus prodi ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data prodi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
