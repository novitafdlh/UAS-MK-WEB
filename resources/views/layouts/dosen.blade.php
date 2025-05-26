<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>SIAKAD Dosen - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-rose-50 to-red-50 font-sans antialiased">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-72 bg-white shadow-xl border-r border-rose-100 flex flex-col justify-between relative overflow-hidden">
            {{-- Background Decoration --}}
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-rose-100 to-transparent rounded-full -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-red-100 to-transparent rounded-full translate-y-12 -translate-x-12"></div>
            
            {{-- Logo / Header --}}
            <div class="relative z-10">
                <div class="p-6 border-b border-rose-100">
                    <div class="flex items-center space-x-3 mb-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-rose-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold bg-gradient-to-r from-rose-600 to-red-600 bg-clip-text text-transparent">
                                SIAKAD DOSEN
                            </h1>
                            <p class="text-xs text-gray-500 font-medium">Sistem Akademik</p>
                        </div>
                    </div>
                </div>

                {{-- User Info --}}
                <div class="px-6 py-4 bg-gradient-to-r from-rose-50 to-red-50 border-b border-rose-100">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-rose-400 to-red-500 rounded-full flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-800 truncate">{{ auth()->user()->name ?? 'Dosen' }}</p>
                            <p class="text-xs text-gray-500">Dosen Pengampu</p>
                        </div>
                        <div class="w-3 h-3 bg-green-400 rounded-full border-2 border-white shadow-sm"></div>
                    </div>
                </div>

                {{-- Navigation --}}
                <nav class="mt-6 px-4 space-y-2">
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2">Menu Utama</p>
                    </div>

                    {{-- Dashboard --}}
                    <a href="{{ route('dosen.dashboard') }}"
                       class="group flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dosen.dashboard') ? 'bg-gradient-to-r from-rose-500 to-red-500 text-white shadow-lg shadow-rose-200' : 'text-gray-600 hover:bg-gradient-to-r hover:from-rose-50 hover:to-red-50 hover:text-rose-600' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dosen.dashboard') ? 'bg-white/20' : 'bg-rose-100 group-hover:bg-rose-200' }} transition-colors duration-200">
                            <svg class="w-5 h-5 {{ request()->routeIs('dosen.dashboard') ? 'text-white' : 'text-rose-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </div>
                        <span class="ml-3 font-medium">Dashboard</span>
                        @if(request()->routeIs('dosen.dashboard'))
                            <div class="ml-auto w-2 h-2 bg-white rounded-full"></div>
                        @endif
                    </a>

                    {{-- Nilai --}}
                    <a href="{{ route('dosen.nilai.index') }}"
                       class="group flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dosen.nilai.*') ? 'bg-gradient-to-r from-rose-500 to-red-500 text-white shadow-lg shadow-rose-200' : 'text-gray-600 hover:bg-gradient-to-r hover:from-rose-50 hover:to-red-50 hover:text-rose-600' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg {{ request()->routeIs('dosen.nilai.*') ? 'bg-white/20' : 'bg-rose-100 group-hover:bg-rose-200' }} transition-colors duration-200">
                            <svg class="w-5 h-5 {{ request()->routeIs('dosen.nilai.*') ? 'text-white' : 'text-rose-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <span class="ml-3 font-medium">Kelola Nilai</span>
                        @if(request()->routeIs('dosen.nilai.*'))
                            <div class="ml-auto w-2 h-2 bg-white rounded-full"></div>
                        @endif
                    </a>

            {{-- Logout Section --}}
            <div class="relative z-10 p-4 border-t border-rose-100 bg-gradient-to-r from-rose-50 to-red-50">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="group flex items-center px-3 py-3 rounded-xl text-gray-600 hover:bg-gradient-to-r hover:from-red-100 hover:to-red-200 hover:text-red-700 transition-all duration-200">
                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-red-100 group-hover:bg-red-200 transition-colors duration-200">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <span class="ml-3 font-medium">Keluar</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 bg-transparent">
            @yield('content')
        </div>

    </div>
</body>
</html>
