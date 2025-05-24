@extends('layouts.app')

@section('content')
<div class="container max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Register Mahasiswa</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="email">Email Mahasiswa</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <input type="hidden" name="role" value="mahasiswa">

        <div>
            <button type="submit">Daftar</button>
        </div>

        <div class="mt-4">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
    </form>
</div>
@endsection
