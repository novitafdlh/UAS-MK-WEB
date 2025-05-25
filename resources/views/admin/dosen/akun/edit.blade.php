@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-red-700">Edit Akun Dosen</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dosen.akun.update', $dosenUser->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-semibold mb-1 text-gray-700">Nama</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $dosenUser->name) }}"
                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition" required>
                @error('name')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1 text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    value="{{ old('email', $dosenUser->email) }}"
                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition" required>
                @error('email')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="password" class="block font-semibold mb-1 text-gray-700">Password (biarkan kosong jika tidak ingin diubah)</label>
                <input type="password" name="password" id="password"
                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                @error('password')<p class="text-red-600 text-sm italic mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="password_confirmation" class="block font-semibold mb-1 text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
            </div>

            <input type="hidden" name="role" value="dosen">

            <div class="pt-4 flex items-center justify-between">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-semibold px-4 py-2 rounded-lg shadow transition duration-200">
                    Update
                </button>
                <a href="{{ route('admin.dosen.akun.index') }}" class="text-gray-600 hover:underline font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
