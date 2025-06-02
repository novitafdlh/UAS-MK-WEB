<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
{{-- Hapus flex items-center justify-center dari body --}}
<body class="font-sans antialiased bg-gradient-to-br from-red-100 to-white min-h-screen">
    {{-- Ini adalah div yang akan menempatkan kotak login di kiri --}}
    <div class="flex"> {{-- Menggunakan flexbox untuk layout horizontal --}}
        <div class="w-1/3 min-h-screen flex items-center justify-center p-8"> {{-- Kolom kiri untuk kotak login --}}
            <main> {{-- Masih membungkus konten dengan main --}}
                @yield('content') {{-- Konten login akan di-render di sini --}}
            </main>
        </div>
        <div class="w-2/3 min-h-screen">
            {{-- Area kosong di kanan, atau bisa untuk gambar/ilustrasi --}}
        </div>
    </div>

    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>