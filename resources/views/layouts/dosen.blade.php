<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-red-800 text-white shadow-lg flex flex-col justify-between">
            <div>
                <div class="p-5 text-center text-xl font-bold border-b border-red-700">
                    Dashboard Dosen
                </div>
                <nav class="mt-6 space-y-2 px-4" aria-label="Sidebar navigation">
                    <a href="{{ route('dosen.dashboard') }}"
                       class="block px-3 py-2 rounded hover:bg-red-700 transition 
                       {{ request()->routeIs('dosen.dashboard') ? 'bg-red-600 font-semibold' : '' }}"
                       aria-current="{{ request()->routeIs('dosen.dashboard') ? 'page' : '' }}">
                        🏠 Beranda
                    </a>
                    <a href="{{ route('dosen.nilai.index') }}"
                       class="block px-3 py-2 rounded hover:bg-red-700 transition 
                       {{ request()->routeIs('dosen.nilai.*') ? 'bg-red-600 font-semibold' : '' }}"
                       aria-current="{{ request()->routeIs('dosen.nilai.*') ? 'page' : '' }}">
                        📝 Nilai
                    </a>
                </nav>
            </div>

            <div class="px-4 py-4 border-t border-red-700">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block px-3 py-2 rounded hover:bg-red-700 text-white transition">
                    🚪 Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </aside>

        <!-- Main Content (placeholder) -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
