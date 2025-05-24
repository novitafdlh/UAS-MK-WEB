@extends('layouts.admin')

@section('content')
<h1>Edit Dosen</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.dosen.data.update', $dosen->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>NIDN:</label><br>
    <input type="text" name="nidn" value="{{ old('nidn', $dosen->nidn) }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}"><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="{{ old('email', $dosen->email) }}"><br>

    <label>Jurusan:</label><br>
    <input type="text" name="jurusan" value="{{ old('jurusan', $dosen->jurusan) }}"><br><br>

    <button type="submit">Update</button>
</form>
@endsection
