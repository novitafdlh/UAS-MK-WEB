<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Dashboard Admin') - SIAKAD</title>
    @vite('resources/css/app.css')
    <style>
        /* Custom gradient background for sidebar */
        .sidebar-gradient {
            background: linear-gradient(135deg, #0D47A1 0%, #092D75 50%, #07215F 100%);
        }

        /* Smooth transitions */
        .sidebar-menu-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Hover effects */
        .sidebar-menu-item:hover {
            transform: translateX(4px);
        }

        /* Active state */
        .active-link {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid #ffffff;
            font-weight: 600;
            transform: translateX(4px);
        }

        /* Submenu animations */
        .submenu-enter {
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom scrollbar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="flex bg-gradient-to-br from-dark-blue-50 to-gray-50 min-h-screen font-sans">
    <div class="w-60 shadow-2xl z-10 flex-shrink-0 sidebar-gradient flex flex-col relative">
        <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -translate-y-16 translate-x-16"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full translate-y-12 -translate-x-12"></div>
        
        <div class="p-4 border-b border-white border-opacity-20">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-white">SIAKAD</h1>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-3 py-4 sidebar-scroll overflow-y-auto">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10"
                       id="dashboard-link">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        <span class="font-normal">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.mahasiswa.index') }}"
                       class="sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        <span class="font-normal">Mahasiswa</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.dosen.index') }}"
                       class="sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-normal">Dosen</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.matakuliah.index') }}"
                       class="sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span class="font-normal">Mata Kuliah</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.jurusan.index') }}"
                       class="sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="font-normal">Jurusan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.prodi.index') }}"
                       class="sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                        </svg>
                        <span class="font-normal">Program Studi</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.jadwal.index') }}"
                       class="sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-white hover:bg-white hover:bg-opacity-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-normal">Jadwal</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="mt-auto p-3 border-t border-white border-opacity-20">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full sidebar-menu-item flex items-center space-x-3 px-3 py-2 rounded-lg text-dark-blue-200 hover:bg-dark-blue-600 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span class="font-normal">Logout</span>
                </button>
            </form>
        </div>
    </div>

    <div class="flex-1 flex flex-col min-h-screen overflow-y-auto">
        @yield('content')
    </div>

    <script>
        function toggleSubmenu(submenuId, button) {
            const submenu = document.getElementById(submenuId);
            const arrow = button.querySelector('svg:last-child');
            
            if (submenu.classList.contains('hidden')) {
                submenu.classList.remove('hidden');
                submenu.classList.add('submenu-enter');
                arrow.classList.add('rotate-180');
            } else {
                submenu.classList.add('hidden');
                submenu.classList.remove('submenu-enter');
                arrow.classList.remove('rotate-180');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const currentPath = window.location.pathname;

            const removeActiveClass = () => {
                document.querySelectorAll('.active-link').forEach(link => {
                    link.classList.remove('active-link');
                });
            };

            document.querySelectorAll('.sidebar-menu-item').forEach(link => {
                if (link.tagName === 'A') {
                    const linkHref = link.getAttribute('href');
                    if (linkHref) {
                        // Normalize linkHref to be relative to the domain
                        const relativeLinkHref = linkHref.replace(window.location.origin, '');
                        if (currentPath === relativeLinkHref) {
                            removeActiveClass();
                            link.classList.add('active-link');
                            
                            // Open parent submenu if this is a submenu item
                            let parentUl = link.closest('ul');
                            if (parentUl && parentUl.id.startsWith('submenu-')) {
                                parentUl.classList.remove('hidden');
                                parentUl.classList.add('submenu-enter');
                                let parentButton = parentUl.previousElementSibling;
                                if (parentButton && parentButton.tagName === 'BUTTON') {
                                    parentButton.querySelector('svg:last-child').classList.add('rotate-180');
                                }
                            }
                        }
                    }
                }
            });

            // Handle dashboard link specifically for the root path
            const dashboardLink = document.getElementById('dashboard-link');
            // Check if currentPath is exactly the dashboard route or the root path
            if (currentPath === '{{ route('admin.dashboard') }}'.replace(window.location.origin, '') || currentPath === '/') {
                removeActiveClass();
                dashboardLink.classList.add('active-link');
            }
        });
    </script>
</body>
</html>