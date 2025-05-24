@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Prodi</h1>

    <form action="{{ route('admin.prodi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select name="jurusan_id" class="form-select" required>
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusan as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Prodi</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
