@extends('layouts.admin')

@section('content')
<h1>Tambah Dosen</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.dosen.data.store') }}" method="POST">
    @csrf
    <label>NIDN:</label><br>
    <input type="text" name="nidn" value="{{ old('nidn') }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama') }}"><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email') }}"><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="{{ old('jurusan') }}"><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
