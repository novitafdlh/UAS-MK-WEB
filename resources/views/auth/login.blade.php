@extends('layouts.app')

@section('content')
<div class="container max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    @if(session('error'))
        <div class="text-red-500">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="role">Masuk sebagai</label>
            <select name="role" id="role" class="w-full border p-2 rounded" required>
                <option value="" disabled selected>Pilih Role</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
            </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full">Login</button>
        </div>
    </form>

    {{-- Tombol Register --}}
    <div class="text-center mt-4">
        <p>Belum punya akun?</p>
        <a href="{{ route('register') }}" class="inline-block mt-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            Daftar sebagai Mahasiswa
        </a>
    </div>
</div>
@endsection
