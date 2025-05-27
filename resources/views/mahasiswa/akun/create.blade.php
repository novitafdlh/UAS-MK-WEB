@extends('layouts.mahasiswa')

@section('title', 'Lengkapi Data Mahasiswa')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Lengkapi Data Mahasiswa</h3>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('mahasiswa.akun.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="prodi_id" class="form-label">Prodi</label>
            <select name="prodi_id" id="prodi_id" class="form-control" required>
                <option value="">-- Pilih Prodi --</option>
                @foreach($prodis as $prodi)
                    <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>{{ $prodi->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" class="form-control" required>
                <option value="">-- Pilih Jurusan --</option>
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ old('jurusan_id') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection