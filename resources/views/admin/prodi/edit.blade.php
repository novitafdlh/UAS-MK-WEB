@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Prodi</h1>

    <form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select name="jurusan_id" class="form-select" required>
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ $prodi->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Prodi</label>
            <input type="text" name="nama" class="form-control" value="{{ $prodi->nama }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.prodi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
