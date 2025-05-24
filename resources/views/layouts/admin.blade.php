<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* CSS Kustom untuk tampilan yang lebih rapi */
        .sidebar-menu-item {
            display: block;
            padding: 0.75rem 1rem; /* Padding vertikal dan horizontal */
            border-radius: 0.375rem; /* Sudut membulat */
            transition: background-color 0.2s ease-in-out; /* Transisi halus saat hover */
            color: #4b5563; /* Warna teks default abu-abu gelap */
        }
        .sidebar-menu-item:hover {
            background-color: #f3f4f6; /* Warna latar belakang saat di-hover */
        }
        .sidebar-submenu-item {
            display: block;
            padding: 0.5rem 1rem; /* Padding lebih kecil untuk submenu */
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out;
            color: #4b5563; /* Warna teks default abu-abu gelap */
        }
        .sidebar-submenu-item:hover {
            background-color: #f3f4f6;
        }
        /* Kelas untuk tautan yang sedang aktif */
        .active-link {
            background-color: #e5e7eb; /* Warna abu-abu terang */
            font-weight: 600; /* Teks semi-bold */
            color: #1f2937; /* Warna teks lebih gelap untuk tautan aktif */
        }
    </style>
</head>
<body class="flex bg-gray-100 min-h-screen font-sans">
    <div class="w-64 bg-white shadow-lg z-10 flex-shrink-0">
        <div class="p-5 font-extrabold text-xl text-gray-800 border-b border-gray-200">SIAKAD Admin</div>
        <ul class="mt-6 space-y-1 px-4">
            <li><a href="{{ route('admin.dashboard') }}" class="sidebar-menu-item" id="dashboard-link">Dashboard</a></li>
            <li>
                <button
                    class="w-full text-left sidebar-menu-item flex justify-between items-center"
                    onclick="document.getElementById('submenu-mahasiswa').classList.toggle('hidden')"
                >
                    Mahasiswa
                    <span class="transform transition-transform duration-200">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <ul id="submenu-mahasiswa" class="hidden ml-4 mt-1 space-y-1">
                    <li><a href="{{ route('admin.mahasiswa.data.index') }}" class="sidebar-submenu-item">Data Mahasiswa</a></li>
                    <li><a href="{{ route('admin.mahasiswa.akun.index') }}" class="sidebar-submenu-item">Akun Mahasiswa</a></li>
                </ul>
            </li>
            <li>
                <button
                    class="w-full text-left sidebar-menu-item flex justify-between items-center"
                    onclick="document.getElementById('submenu-dosen').classList.toggle('hidden')"
                >
                    Dosen
                    <span class="transform transition-transform duration-200">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <ul id="submenu-dosen" class="hidden ml-4 mt-1 space-y-1">
                    <li><a href="{{ route('admin.dosen.data.index') }}" class="sidebar-submenu-item">Data Dosen</a></li>
                    <li><a href="{{ route('admin.dosen.akun.index') }}" class="sidebar-submenu-item">Akun Dosen</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.matakuliah.index') }}" class="sidebar-menu-item">Mata Kuliah</a></li>
            <li><a href="{{ route('admin.jurusan.index') }}" class="sidebar-menu-item">Jurusan</a></li>
            <li><a href="{{ route('admin.prodi.index') }}" class="sidebar-menu-item">Program Studi</a></li>
            <li><a href="{{ route('admin.jadwal.index') }}" class="sidebar-menu-item">Jadwal</a></li>
            <li class="pt-4 border-t border-gray-200 mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left sidebar-menu-item text-red-600 hover:bg-red-50">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="flex-1 p-8">
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const currentPath = window.location.pathname; // Mendapatkan path URL saat ini

            // Fungsi untuk menghapus semua kelas 'active-link'
            const removeActiveClass = () => {
                document.querySelectorAll('.active-link').forEach(link => {
                    link.classList.remove('active-link');
                });
            };

            // Tambahkan event listener untuk setiap tautan di sidebar
            document.querySelectorAll('.sidebar-menu-item, .sidebar-submenu-item').forEach(link => {
                link.addEventListener('click', (event) => {
                    // Hanya tambahkan active-link saat diklik, tidak perlu mencegah default
                    removeActiveClass(); // Hapus semua kelas aktif yang ada
                    event.currentTarget.classList.add('active-link'); // Tambahkan ke tautan yang sedang diklik

                    // Menangani rotasi panah dropdown saat klik
                    if (event.currentTarget.tagName === 'BUTTON') {
                        const submenuId = event.currentTarget.onclick.toString().match(/getElementById\('([^']+)'\)/)[1];
                        const submenu = document.getElementById(submenuId);
                        const arrowSpan = event.currentTarget.querySelector('span');
                        if (submenu.classList.contains('hidden')) {
                            arrowSpan.classList.remove('rotate-180');
                        } else {
                            arrowSpan.classList.add('rotate-180');
                        }
                    }
                });

                // Inisialisasi status aktif berdasarkan URL saat ini
                const linkHref = link.getAttribute('href');
                // Periksa apakah linkHref ada dan cocok dengan path saat ini
                if (linkHref && currentPath === linkHref.replace(window.location.origin, '')) {
                    link.classList.add('active-link');
                    // Jika tautan aktif adalah bagian dari submenu, buka submenu tersebut
                    let parentUl = link.closest('ul');
                    if (parentUl && parentUl.id.startsWith('submenu-')) {
                        parentUl.classList.remove('hidden');
                        let parentButton = parentUl.previousElementSibling;
                        if (parentButton && parentButton.tagName === 'BUTTON') {
                            parentButton.querySelector('span').classList.add('rotate-180');
                        }
                    }
                }
            });

            // Aktifkan menu Dashboard secara default saat halaman dimuat (setelah login)
            const dashboardLink = document.getElementById('dashboard-link');
            // Cek apakah path saat ini adalah dashboard atau root, lalu aktifkan dashboard
            if (currentPath === '{{ route('admin.dashboard') }}'.replace(window.location.origin, '') || currentPath === '/') {
                removeActiveClass(); // Pastikan tidak ada yang aktif sebelumnya
                dashboardLink.classList.add('active-link');
            }
        });
    </script>
</body>
</html>