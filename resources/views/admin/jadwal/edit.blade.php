@extends('layouts.admin')

@section('content')
<h1>Edit Jadwal</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="prodi_id">Prodi</label>
        <select name="prodi_id" id="prodi_id" class="form-control" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodis as $prodi)
                <option value="{{ $prodi->id }}" {{ old('prodi_id') == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="mata_kuliah_id">Mata Kuliah</label>
        <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-control" required>
            <option value="">-- Pilih Mata Kuliah --</option>
            @foreach($matakuliahs as $mk)
                <option value="{{ $mk->id }}" {{ (old('mata_kuliah_id', $jadwal->mata_kuliah_id) == $mk->id) ? 'selected' : '' }}>
                    {{ $mk->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="dosen_id">Dosen</label>
        <select name="dosen_id" id="dosen_id" class="form-control" required>
            <option value="">-- Pilih Dosen --</option>
            @foreach($dosens as $dosen)
                <option value="{{ $dosen->id }}" {{ (old('dosen_id', $jadwal->dosen_id) == $dosen->id) ? 'selected' : '' }}>
                    {{ $dosen->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="hari">Hari</label>
        <input type="text" name="hari" id="hari" class="form-control" value="{{ old('hari', $jadwal->hari) }}" required>
    </div>

    <div class="mb-3">
        <label for="jam_mulai">Jam Mulai</label>
        <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}" required>
    </div>

    <div class="mb-3">
        <label for="jam_selesai">Jam Selesai</label>
        <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="{{ old('jam_selesai', $jadwal->jam_selesai) }}" required>
    </div>

    <div class="mb-3">
        <label for="ruangan">Ruangan</label>
        <input type="text" name="ruangan" id="ruangan" class="form-control" value="{{ old('ruangan', $jadwal->ruangan) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
