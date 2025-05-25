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
                <nav class="mt-6 space-y-2 px-4">
                    <a href="{{ route('dosen.dashboard') }}"
                       class="block px-3 py-2 rounded hover:bg-red-700 transition {{ request()->routeIs('dosen.dashboard') ? 'bg-red-600 font-semibold' : '' }}">
                        🏠 Beranda
                    </a>
                    <a href="{{ route('dosen.nilai.index') }}"
                       class="block px-3 py-2 rounded hover:bg-red-700 transition {{ request()->routeIs('dosen.nilai.*') ? 'bg-red-600 font-semibold' : '' }}">
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

        <!-- Main Content -->
        <main class="flex-1 p-6">
            {{-- Header --}}
            <header class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('img/untad-new.jpeg') }}" alt="Logo Untad" class="w-10 h-auto" />
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Universitas Tadulako</h1>
                        <p class="text-sm text-gray-500">Sistem Informasi Akademik Dosen</p>
                    </div>
                </div>
                <div class="text-right text-gray-600">
                    Halo, <span class="font-semibold text-indigo-600 ml-2">{{ auth()->user()->name }}</span>
                </div>
            </header>

            {{-- Page Title --}}
            <h2 class="text-xl font-semibold text-red-700 mb-6">Dashboard Dosen</h2>

            {{-- Statistik Box (Contoh khusus dosen) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-indigo-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-indigo-700">Mahasiswa Bimbingan</h2>
                    <p class="text-4xl font-bold text-indigo-900 mt-2">25</p>
                </div>

                <div class="bg-green-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-green-700">Jumlah Tugas</h2>
                    <p class="text-4xl font-bold text-green-900 mt-2">12</p>
                </div>

                <div class="bg-yellow-100 p-5 rounded-xl shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold text-yellow-700">Pertemuan Mingguan</h2>
                    <p class="text-4xl font-bold text-yellow-900 mt-2">5</p>
                </div>
            </div>

            <!-- Visi & Misi UNTAD -->
            <div class="p-6 rounded-xl shadow-md bg-red-800 mb-6 text-white">
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Visi & Misi Universitas Tadulako</h2>

                {{-- Visi --}}
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-white mb-2">🎯 Visi</h3>
                    <p class="italic border-l-4 border-white pl-4">
                        “Universitas Tadulako Menjadi Perguruan Tinggi Berstandar Internasional Dalam Pengembangan IPTEKS Berwawasan Lingkungan Hidup.”
                    </p>
                </div>

                {{-- Misi --}}
                <div>
                    <h3 class="text-xl font-semibold text-white mb-3">📌 Misi</h3>
                    <ol class="list-decimal list-inside space-y-3 text-white pl-2">
                        <li>
                            Menyelenggarakan pendidikan yang bermutu, modern, dan relevan menuju pencapaian standar internasional dalam pengembangan IPTEKS berwawasan lingkungan hidup.
                        </li>
                        <li>
                            Menyelenggarakan penelitian yang bermutu untuk pengembangan IPTEKS berwawasan lingkungan hidup.
                        </li>
                        <li>
                            Menyelenggarakan pengabdian kepada masyarakat sebagai pemanfaatan hasil pendidikan dan hasil penelitian yang dibutuhkan dalam pembangunan masyarakat.
                        </li>
                        <li>
                            Menyelenggarakan reformasi birokrasi dan kerjasama regional, nasional dan internasional.
                        </li>
                    </ol>
                </div>
            </div>

            {{-- Content Area --}}

            {{-- Footer --}}
            <footer class="text-center text-sm text-gray-500 mt-8">
                &copy; {{ date('Y') }} Universitas Tadulako. All rights reserved.
            </footer>
        </main>
    </div>
</body>
</html>
