@extends('layouts.admin')

@section('content')
<h1>Tambah Matakuliah</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.matakuliah.store') }}" method="POST">
    @csrf
    <label>Kode:</label><br>
    <input type="text" name="kode" value="{{ old('kode') }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}"><br>

    <label>SKS:</label><br>
    <input type="number" name="sks" value="{{ old('sks') }}"><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="{{ old('jurusan') }}"><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
