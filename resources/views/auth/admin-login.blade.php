<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login Admin - SIAKAD Universitas Tadulako</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-rose-50 to-red-50 font-sans antialiased min-h-screen flex items-center justify-center p-4">
    
    {{-- Background Decoration --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-bl from-rose-100/30 to-transparent rounded-full -translate-y-48 translate-x-48"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-red-100/30 to-transparent rounded-full translate-y-40 -translate-x-40"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-gradient-to-r from-rose-200/20 to-red-200/20 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
    </div>

    {{-- Login Container --}}
    <div class="relative w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl border border-rose-100 overflow-hidden">
            
            {{-- Header Section --}}
            <div class="bg-gradient-to-r from-rose-500 to-red-500 p-8 text-center text-white relative overflow-hidden">
                {{-- Background Pattern --}}
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative z-10">
                    {{-- Logo --}}
                    <div class="mb-4">
                        <div class="w-20 h-20 mx-auto bg-white/20 rounded-2xl flex items-center justify-center shadow-lg backdrop-blur-sm">
                            <img src="{{ asset('img/untad-new.jpeg') }}" 
                                 alt="Logo Untad" 
                                 class="w-14 h-14 object-contain rounded-xl" />
                        </div>
                    </div>
                    
                    {{-- Title --}}
                    <h1 class="text-2xl font-bold mb-2">Admin Portal</h1>
                    <p class="text-rose-100 text-sm font-medium">Sistem Informasi Akademik</p>
                    <p class="text-white/80 text-xs">Universitas Tadulako</p>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="p-8">
                {{-- Welcome Message --}}
                <div class="text-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Selamat Datang</h2>
                    <p class="text-gray-600 text-sm">Masuk ke panel administrasi sistem akademik</p>
                </div>

                {{-- Error Messages --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-red-100 border border-red-200 rounded-xl shadow-sm">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-red-800 font-medium text-sm mb-1">Terjadi kesalahan:</h3>
                                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Login Form --}}
                <form action="{{ route('login.admin.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Email Field --}}
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Email Administrator
                            </div>
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            <input type="email" 
                                   name="email" 
                                   id="email"
                                   value="{{ old('email') }}"
                                   placeholder="Masukkan email administrator"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all duration-200 @error('email') border-red-300 @enderror"
                                   required 
                                   autofocus>
                        </div>
                        @error('email') 
                            <div class="mt-2 p-2 bg-red-50 border border-red-200 rounded-lg">
                                <p class="text-red-600 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            </div>
                        @enderror
                    </div>

                    {{-- Password Field --}}
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-3">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Password
                            </div>
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <input type="password" 
                                   name="password" 
                                   id="password"
                                   placeholder="Masukkan password"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-rose-500 focus:border-transparent transition-all duration-200 @error('password') border-red-300 @enderror"
                                   required>
                        </div>
                        @error('password') 
                            <div class="mt-2 p-2 bg-red-50 border border-red-200 rounded-lg">
                                <p class="text-red-600 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            </div>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="remember" 
                                   class="w-4 h-4 text-rose-600 bg-gray-100 border-gray-300 rounded focus:ring-rose-500 focus:ring-2">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                        <a href="#" class="text-sm text-rose-600 hover:text-rose-800 font-medium transition-colors duration-200">
                            Lupa password?
                        </a>
                    </div>

                    {{-- Login Button --}}
                    <button type="submit" 
                            class="w-full py-3 px-4 bg-gradient-to-r from-rose-500 to-red-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-rose-600 hover:to-red-600 transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk ke Admin Panel
                    </button>
                </form>

                {{-- Additional Info --}}
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="text-center">
                        <p class="text-xs text-gray-500 mb-2">Portal khusus administrator sistem</p>
                        <div class="flex items-center justify-center gap-2 text-xs text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <span>Akses terbatas dan terenkripsi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        <div class="text-center mt-6">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full shadow-sm border border-rose-100">
                <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <span class="text-sm text-gray-600">
                    &copy; {{ date('Y') }} Universitas Tadulako
                </span>
            </div>
        </div>
    </div>

    {{-- Loading Animation (Optional) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            
            form.addEventListener('submit', function() {
                submitButton.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Memproses...
                `;
                submitButton.disabled = true;
            });
        });
    </script>
</body>
</html>
