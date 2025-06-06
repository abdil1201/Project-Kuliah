<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Produktivitas App') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .gradient-text {
            background: linear-gradient(to right, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .animate-pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="antialiased bg-black">
    <!-- Navigation with Glassmorphism -->
    <nav class="fixed w-full z-50 bg-black/80 backdrop-blur-lg border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-xl font-bold gradient-text">Produktivitas App</h1>
                    </div>
                </div>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-300 hover:text-white transition-all duration-300 hover:scale-105">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white transition-all duration-300 hover:scale-105">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-indigo-400 hover:text-indigo-300 transition-all duration-300 hover:scale-105">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Advanced Animation -->
    <div class="relative min-h-screen overflow-hidden bg-black">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-b from-indigo-900/20 to-purple-900/20"></div>
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-indigo-900/20 via-black to-black"></div>
            <div class="absolute inset-0 opacity-30">
                <div class="absolute inset-0 animate-pulse-slow bg-[url('data:image/svg+xml,...')] bg-center"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center space-y-12">
                    <!-- Animated Heading -->
                    <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold tracking-tight">
                        <span class="block text-white mb-4 animate-float">Tingkatkan Produktivitasmu</span>
                        <span class="block gradient-text text-4xl sm:text-5xl md:text-6xl">Capai Targetmu Sekarang</span>
                    </h1>

                    <!-- Enhanced Description -->
                    <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl text-gray-400 leading-relaxed">
                        Platform produktivitas modern yang membantu Anda mencatat, menganalisis, dan meningkatkan efisiensi kerja sehari-hari.
                    </p>

                    <!-- CTA Buttons with Hover Effects -->
                    <div class="flex justify-center gap-6">
                        <a href="{{ route('register') }}" class="group relative inline-flex items-center px-8 py-3 overflow-hidden rounded-lg bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-2xl transition-all duration-300 hover:scale-105 hover:shadow-indigo-500/25">
                            <span class="relative">Mulai Sekarang</span>
                            <svg class="ml-2 h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#features" class="group relative inline-flex items-center px-8 py-3 overflow-hidden rounded-lg bg-gray-900 text-gray-300 border border-gray-700 transition-all duration-300 hover:bg-gray-800 hover:scale-105">
                            <span class="relative">Pelajari Lebih Lanjut</span>
                        </a>
                    </div>

                    <!-- Stats Section -->
                    <div class="mt-20 grid grid-cols-2 gap-8 md:grid-cols-4">
                        <div class="flex flex-col items-center">
                            <div class="text-4xl font-bold text-indigo-400 mb-2">1000+</div>
                            <div class="text-gray-400">Pengguna Aktif</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="text-4xl font-bold text-purple-400 mb-2">50K+</div>
                            <div class="text-gray-400">Aktivitas Tercatat</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="text-4xl font-bold text-indigo-400 mb-2">98%</div>
                            <div class="text-gray-400">Kepuasan Pengguna</div>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="text-4xl font-bold text-purple-400 mb-2">24/7</div>
                            <div class="text-gray-400">Dukungan Online</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section with Cards -->
    <div id="features" class="py-24 bg-black relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-black via-gray-900/50 to-black"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold text-white mb-4">Fitur Unggulan</h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-lg">Tingkatkan produktivitas Anda dengan fitur-fitur canggih yang kami sediakan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="group relative transform transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative p-8 bg-black rounded-xl shadow-2xl">
                        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-900/30 mb-6">
                            <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Manajemen Tugas</h3>
                        <p class="text-gray-400">Organisir tugas dengan mudah menggunakan sistem manajemen yang intuitif dan efisien.</p>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="group relative transform transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-indigo-500 rounded-xl blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative p-8 bg-black rounded-xl shadow-2xl">
                        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-purple-900/30 mb-6">
                            <svg class="w-8 h-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Analisis Real-time</h3>
                        <p class="text-gray-400">Pantau produktivitas Anda dengan grafik dan statistik yang update secara real-time.</p>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="group relative transform transition-all duration-300 hover:-translate-y-2">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl blur opacity-50 group-hover:opacity-75 transition duration-300"></div>
                    <div class="relative p-8 bg-black rounded-xl shadow-2xl">
                        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-900/30 mb-6">
                            <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Kalender Pintar</h3>
                        <p class="text-gray-400">Rencanakan aktivitas dengan kalender pintar yang terintegrasi dengan reminder.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-24 bg-black relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Apa Kata Mereka?</h2>
                <p class="text-gray-400">Pengalaman pengguna yang telah merasakan manfaat aplikasi kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gradient-to-br from-gray-900 to-black p-8 rounded-xl shadow-2xl transform transition-all duration-300 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-full bg-indigo-500/20 flex items-center justify-center">
                            <span class="text-xl text-indigo-400">A</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-white font-semibold">Andi Pratama</h4>
                            <p class="text-gray-400 text-sm">Freelancer</p>
                        </div>
                    </div>
                    <p class="text-gray-300">"Aplikasi ini sangat membantu saya mengatur waktu dan tugas dengan lebih efisien. Fitur analisisnya luar biasa!"</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gradient-to-br from-gray-900 to-black p-8 rounded-xl shadow-2xl transform transition-all duration-300 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-full bg-purple-500/20 flex items-center justify-center">
                            <span class="text-xl text-purple-400">B</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-white font-semibold">Budi Santoso</h4>
                            <p class="text-gray-400 text-sm">Pengusaha</p>
                        </div>
                    </div>
                    <p class="text-gray-300">"Dashboard yang intuitif dan laporan yang detail membuat tracking produktivitas jadi lebih mudah."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gradient-to-br from-gray-900 to-black p-8 rounded-xl shadow-2xl transform transition-all duration-300 hover:scale-105">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 rounded-full bg-indigo-500/20 flex items-center justify-center">
                            <span class="text-xl text-indigo-400">C</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-white font-semibold">Clara Dewi</h4>
                            <p class="text-gray-400 text-sm">Mahasiswa</p>
                        </div>
                    </div>
                    <p class="text-gray-300">"Sempurna untuk mengatur jadwal kuliah dan deadline tugas. Tampilan yang modern membuatnya nyaman digunakan."</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative py-20 bg-black">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-b from-indigo-900/20 via-black to-black"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-white mb-6">Mulai Perjalanan Produktif Anda</h2>
                <p class="text-gray-400 max-w-2xl mx-auto mb-10 text-lg">
                    Bergabung sekarang dan rasakan perbedaannya dalam mengelola waktu dan aktivitas Anda.
                </p>
                <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold shadow-2xl hover:shadow-indigo-500/25 transition-all duration-300 hover:scale-105">
                    Daftar Gratis
                    <svg class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black border-t border-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white font-semibold mb-4">Produk</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Fitur</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Harga</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Perusahaan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Karir</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Sumber Daya</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Dokumentasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Panduan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Tutorial</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Bantuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Partner</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-800">
                <p class="text-center text-gray-400">
                    © {{ date('Y') }} Produktivitas App. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>



