<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-lg flex flex-col justify-between">
            <div>
                <div class="p-4 text-center font-bold text-teal-600 text-xl border-b">
                    SIAKAD
                </div>
                <nav class="mt-4 space-y-2 px-4">
                    <a href="{{ route('mahasiswa.dashboard') }}" class="block px-3 py-2 rounded hover:bg-teal-100 {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-teal-200' : '' }}">
                        🏠 Dashboard
                    </a>
                    <a href="{{ route('mahasiswa.krs.index') }}" class="block px-3 py-2 rounded hover:bg-teal-100 {{ request()->routeIs('mahasiswa.krs.*') ? 'bg-teal-200' : '' }}">
                        📚 KRS
                    </a>
                </nav>
            </div>

            {{-- Logout --}}
            <div class="px-4 py-4 border-t">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block px-3 py-2 rounded text-red-600 hover:bg-red-100">
                    🚪 Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-semibold text-teal-700 mb-6">@yield('title')</h1>
            @yield('content')
        </main>
    </div>

</body>
</html>
