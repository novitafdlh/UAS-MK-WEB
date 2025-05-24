@extends('layouts.admin')

@section('content')
<h1>Tambah Mahasiswa</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.mahasiswa.store') }}" method="POST">
    @csrf
    <label>NIM:</label><br>
    <input type="text" name="nim" value="{{ old('nim') }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}"><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email') }}"><br>

    <label>Prodi:</label><br>
    <input type="text" name="prodi" value="{{ old('prodi') }}"><br><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="{{ old('jurusan') }}"><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
