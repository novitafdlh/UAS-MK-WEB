@extends('layouts.admin')

@section('content')


<div class="max-w-4xl mx-auto mt-10 px-4">
    <div class="bg-red-300 p-8 rounded-2xl shadow-lg border border-gray-200">
        <h1 class="text-3xl font-bold text-center text-white mb-8">Edit Akun Dosen</h1>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-700 px-5 py-4 rounded-lg mb-6">
                <strong class="block font-semibold">Terdapat kesalahan:</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.dosen.akun.update', $dosenUser->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $dosenUser->name) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-rose-500 transition text-left"
                    placeholder="Masukkan nama dosen" required>
                @error('name')
                    <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $dosenUser->email) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 transition"
                    placeholder="Masukkan email dosen" required>
                @error('email')
                    <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">
                    Password <span class="text-gray-500 text-xs">(kosongkan jika tidak ingin diubah)</span>
                </label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 transition"
                    placeholder="Masukkan password baru">
                @error('password')
                    <p class="text-red-600 text-xs mt-1 italic">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-rose-500 transition"
                    placeholder="Ulangi password baru">
            </div>

            <input type="hidden" name="role" value="dosen">

            <div class="pt-6 flex flex-col items-center">
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-3 py-3 rounded-lg shadow transition duration-200 w-full max-w-xs">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.dosen.akun.index') }}"
                    class="mt-3 text-gray-600 hover:text-rose-600 transition text-sm font-semibold">
                    ← Kembali ke daftar akun
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
