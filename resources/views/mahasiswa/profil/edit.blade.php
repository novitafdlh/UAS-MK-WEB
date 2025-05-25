@extends('layouts.mahasiswa')

@section('title', 'Edit Profil Mahasiswa')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">

    <h1 class="text-2xl font-bold mb-6">Edit Profil</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.profil.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-semibold">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $mahasiswa->name) }}" class="w-full border px-4 py-2 rounded">
        </div>

        <div>
            <label for="email" class="block font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $mahasiswa->email) }}" class="w-full border px-4 py-2 rounded">
        </div>

        {{-- Tambahkan input lainnya sesuai kebutuhan --}}

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
