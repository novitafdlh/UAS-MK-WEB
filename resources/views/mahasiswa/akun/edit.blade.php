@extends('layouts.mahasiswa')

@section('content')
<div class="container">
    <h3>Edit Akun Mahasiswa</h3>
    <form action="{{ route('mahasiswa.akun.update', $akun->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim', $akun->nim) }}">
            @error('nim') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $akun->nama) }}">
            @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $akun->email) }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="prodi_id" class="form-label">Prodi</label>
            <select name="prodi_id" class="form-control">
                <option value="">-- Pilih Prodi --</option>
                @foreach(App\Models\Prodi::all() as $prodi)
                    <option value="{{ $prodi->id }}" {{ (old('prodi_id', $akun->prodi_id) == $prodi->id) ? 'selected' : '' }}>
                        {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
            @error('prodi_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="jurusan_id" class="form-label">Jurusan</label>
            <select name="jurusan_id" class="form-control">
                <option value="">-- Pilih Jurusan --</option>
                @foreach(App\Models\Jurusan::all() as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ (old('jurusan_id', $akun->jurusan_id) == $jurusan->id) ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
            @error('jurusan_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('akun.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
