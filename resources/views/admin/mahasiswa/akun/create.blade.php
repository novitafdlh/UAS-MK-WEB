@extends('layouts.admin')

@section('content')
<div class="max-w-lg mx-auto">
    @if ($errors->any())
    <div class="mb-8 max-w-lg mx-auto p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg shadow">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.mahasiswa.akun.store') }}" method="POST" class="bg-white p-8 rounded-xl shadow-md space-y-6">
        @csrf

        <h1 class="text-3xl font-bold mb-6 text-center text-red-700">Tambah Akun Mahasiswa Baru</h1>

        <div>
            <label for="name" class="block mb-2 font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label for="email" class="block mb-2 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label for="role" class="block mb-2 font-semibold text-gray-700">Role</label>
            <select name="role" id="role" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
                <option value="mahasiswa" selected>Mahasiswa</option>
            </select>
        </div>

        <div>
            <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
            <input type="password" name="password" id="password" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div>
            <label for="password_confirmation" class="block mb-2 font-semibold text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-red-500 focus:outline-none">
        </div>

        <div class="flex items-center justify-between pt-4">
            <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-200">
                Simpan
            </button>
            <a href="{{ route('admin.mahasiswa.akun.index') }}" 
               class="text-gray-600 hover:underline font-semibold">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
