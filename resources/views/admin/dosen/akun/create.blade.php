@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow-lg"> {{-- Menambahkan shadow-lg --}}
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Akun Dosen Baru</h1> {{-- Warna teks lebih gelap --}}

    @if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"> {{-- Styling alert lebih lengkap --}}
        <strong class="font-bold">Oops! Ada masalah:</strong>
        <span class="block sm:inline">Pastikan semua field terisi dengan benar.</span>
        <ul class="mt-3 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.dosen.akun.store') }}" method="POST" class="space-y-5"> {{-- Menggunakan space-y untuk jarak vertikal --}}
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror px-3 py-2"
                   required placeholder="Masukkan nama dosen">
            @error('name')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-500 @enderror px-3 py-2"
                   required placeholder="Masukkan alamat email">
            @error('email')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Karena role sudah pasti 'dosen', kita bisa menggunakan hidden input --}}
        {{-- Atau jika ingin tetap terlihat tapi tidak bisa diubah, gunakan disabled dan hidden input --}}
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <select name="role" id="role"
                    class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed px-3 py-2"
                    disabled> {{-- Disabled agar tidak bisa diubah --}}
                <option value="dosen" selected>Dosen</option>
            </select>
            {{-- Kirim nilai role via hidden input agar tetap terkirim saat form disubmit --}}
            <input type="hidden" name="role" value="dosen">
            @error('role')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('password') border-red-500 @enderror px-3 py-2"
                   required placeholder="Masukkan password">
            @error('password')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 px-3 py-2"
                   required placeholder="Konfirmasi password">
        </div>

        <div class="flex justify-end space-x-3 pt-4"> {{-- Tombol di pojok kanan bawah --}}
            <a href="{{ route('admin.dosen.akun.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Batal
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Simpan Akun
            </button>
        </div>
    </form>
</div>
@endsection