<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="p-4 font-bold text-xl text-center border-b">Dashboard Dosen</div>
        <nav class="p-4 space-y-2">
            <a href="{{ route('dosen.dashboard') }}"
               class="block py-2 px-4 rounded hover:bg-gray-200 {{ request()->routeIs('dosen.dashboard') ? 'bg-gray-300 font-semibold' : '' }}">
                🏠 Beranda
            </a>

            <a href="{{ route('dosen.nilai.index') }}"
               class="block py-2 px-4 rounded hover:bg-gray-200 {{ request()->routeIs('dosen.nilai.*') ? 'bg-gray-300 font-semibold' : '' }}">
                📝 Nilai
            </a>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="block py-2 px-4 rounded hover:bg-red-200 text-red-600">
                🚪 Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>

</body>
</html>
