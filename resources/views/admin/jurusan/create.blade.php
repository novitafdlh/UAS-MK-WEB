@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Jurusan</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jurusan.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Jurusan:</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.jurusan.index') }}" class="mr-2 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
