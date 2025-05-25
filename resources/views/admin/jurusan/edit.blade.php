@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto mt-6 bg-white p-8 rounded-xl shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-center text-red-700">Edit Jurusan</h1>

    @if($errors->any())
        <div class="mb-6 bg-red-100 text-red-700 p-4 rounded shadow">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Jurusan</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $jurusan->nama) }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ route('admin.jurusan.index') }}"
               class="px-6 py-2 bg-gray-300 rounded hover:bg-gray-400 font-semibold">
               Batal
            </a>
            <button type="submit"
                    class="px-6 py-2 bg-red-700 text-white rounded hover:bg-red-800 font-semibold shadow transition duration-200">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
