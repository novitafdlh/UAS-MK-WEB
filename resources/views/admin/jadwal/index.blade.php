@extends('layouts.admin')

@section('content')
<h1>Daftar Jadwal</h1>

<a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Prodi</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Ruangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jadwals as $jadwal)
        <tr>
            <td>{{ $jadwal->id }}</td>
            <td>{{ $jadwal->prodi->nama ?? '-' }}</td>
            <td>{{ $jadwal->mata_Kuliah->nama ?? '-' }}</td>
            <td>{{ $jadwal->dosen->name ?? '-' }}</td>
            <td>{{ $jadwal->hari }}</td>
            <td>{{ $jadwal->jam_mulai }}</td>
            <td>{{ $jadwal->jam_selesai }}</td>
            <td>{{ $jadwal->ruangan }}</td>
            <td>
                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin hapus jadwal ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="9" class="text-center">Belum ada data jadwal.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
