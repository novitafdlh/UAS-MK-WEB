@extends('layouts.mahasiswa')

@section('title', 'Profil Mahasiswa')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">

    <h1 class="text-2xl font-bold mb-6">Profil Mahasiswa</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <label class="font-semibold">Nama:</label>
        <p>{{ $mahasiswa->name }}</p>
    </div>

    <div class="mb-4">
        <label class="font-semibold">Email:</label>
        <p>{{ $mahasiswa->email }}</p>
    </div>

    <div class="mb-4">
        <label class="font-semibold">Program Studi:</label>
        <p>{{ $mahasiswa->prodi->nama ?? '-' }}</p>
    </div>

    <a href="{{ route('mahasiswa.profil.edit') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Edit Profil
    </a>
</div>
@endsection
