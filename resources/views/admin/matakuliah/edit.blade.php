@extends('layouts.admin')

@section('content')
<h1>Edit Matakuliah</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.matakuliah.update', $matakuliah->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Kode:</label><br>
    <input type="text" name="kode" value="{{ old('kode', $matakuliah->kode) }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama', $matakuliah->nama) }}"><br>

    <label>SKS:</label><br>
    <input type="number" name="sks" value="{{ old('sks', $matakuliah->sks) }}"><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="{{ old('jurusan', $matakuliah->jurusan) }}"><br><br>

    <button type="submit">Update</button>
</form>
@endsection
