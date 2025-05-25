@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto mt-6 px-6 py-8 bg-white shadow rounded-xl">
    <h1 class="text-3xl font-bold mb-6 text-center text-red-700">Tambah Jurusan</h1>

    @if ($errors->any())
        <div class="mb-8 max-w-lg mx-auto p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg shadow">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jurusan.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Jurusan</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('admin.jurusan.index') }}"
               class="text-gray-600 hover:underline font-semibold">
                Batal
            </a>
            <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
