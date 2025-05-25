<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>SIAKAD Mahasiswa - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-red-800 text-white shadow-lg flex flex-col justify-between">
            {{-- Logo / Header --}}
            <div>
                <div class="p-5 text-center text-xl font-bold border-b border-red-700">
                    SIAKAD UNTAD
                </div>

                {{-- Navigation --}}
                <nav class="mt-6 space-y-2 px-4">
                    <a href="{{ route('mahasiswa.dashboard') }}"
                       class="block px-4 py-2 rounded hover:bg-red-700 transition {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-red-600' : '' }}">
                        🏠 Dashboard
                    </a>

                    <a href="{{ route('mahasiswa.krs.index') }}"
                       class="block px-4 py-2 rounded hover:bg-red-700 transition {{ request()->routeIs('mahasiswa.krs.*') ? 'bg-red-600' : '' }}">
                        📚 KRS
                    </a>

                    <a href="{{ route('mahasiswa.akun.index') }}"
                       class="block px-4 py-2 rounded hover:bg-red-700 transition {{ request()->routeIs('mahasiswa.akun.*') ? 'bg-red-600' : '' }}">
                        👤 Akun
                    </a>
                </nav>
            </div>

            {{-- Logout --}}
            <div class="px-4 py-4 border-t border-red-700">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block px-4 py-2 rounded hover:bg-red-700 transition">
                    🚪 Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 bg-white">
            @yield('content')
        </div>

    </div>
</body>
</html>
