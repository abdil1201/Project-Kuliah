<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .hover-translate-x {
                transition: transform 0.3s ease;
            }
            .hover-translate-x:hover svg {
                transform: translateX(4px);
            }
            .gradient-border {
                position: relative;
                background: linear-gradient(to right, #4f46e5, #9333ea);
                padding: 1px;
                border-radius: 0.75rem;
            }
            .gradient-border::before {
                content: "";
                position: absolute;
                inset: 0;
                border-radius: 0.75rem;
                padding: 1px;
                background: linear-gradient(to right, #4f46e5, #9333ea);
                mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
            }
            .nav-link {
                transition: all 0.3s ease;
            }
            .nav-link:hover {
                transform: translateX(4px);
                background: linear-gradient(to right, rgba(79, 70, 229, 0.1), rgba(147, 51, 234, 0.1));
            }
            .nav-link.active {
                background: linear-gradient(to right, rgba(79, 70, 229, 0.2), rgba(147, 51, 234, 0.2));
                border-right: 3px solid #4f46e5;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black">
            <!-- Navigation -->
            <nav class="fixed top-0 z-50 w-full bg-black/80 backdrop-blur-xl border-b border-gray-800">
                <div class="px-3 py-3 lg:px-5 lg:pl-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start">
                            <button @click="$store.sidebar.toggleSidebar()" class="inline-flex items-center p-2 text-sm rounded-lg focus:outline-none text-gray-400 hover:bg-gray-800 hover:text-white transition-all duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            <a href="{{ route('dashboard') }}" class="flex ml-2 md:mr-24">
                                <span class="self-center text-xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent whitespace-nowrap">Produktivitas App</span>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center ml-3">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-300 rounded-lg hover:text-white hover:bg-gray-800 transition-all duration-300">
                                            <div>{{ Auth::user()->name }}</div>
                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-300 hover:text-white hover:bg-gray-800">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();" class="text-gray-300 hover:text-white hover:bg-gray-800">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Sidebar -->
            <aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-black/80 backdrop-blur-xl border-r border-gray-800 sm:translate-x-0" aria-label="Sidebar" x-show="$store.sidebar.open">
                <div class="h-full px-3 pb-4 overflow-y-auto">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="{{ route('dashboard') }}" class="nav-link flex items-center p-2 rounded-lg {{ request()->routeIs('dashboard') ? 'active' : '' }} text-gray-300 hover:text-white group">
                                <svg class="w-5 h-5 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('activities.index') }}" class="nav-link flex items-center p-2 rounded-lg {{ request()->routeIs('activities.*') ? 'active' : '' }} text-gray-300 hover:text-white group">
                                <svg class="w-5 h-5 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <span class="ml-3">Aktivitas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('notes.index') }}" class="nav-link flex items-center p-2 rounded-lg {{ request()->routeIs('notes.*') ? 'active' : '' }} text-gray-300 hover:text-white group">
                                <svg class="w-5 h-5 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span class="ml-3">Catatan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('statistics') }}" class="nav-link flex items-center p-2 rounded-lg {{ request()->routeIs('statistics') ? 'active' : '' }} text-gray-300 hover:text-white group">
                                <svg class="w-5 h-5 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <span class="ml-3">Statistik</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Page Content -->
            <main class="sm:ml-64 pt-20">
                <div class="p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('sidebar', {
                    open: window.innerWidth >= 640,
                    toggleSidebar() {
                        this.open = !this.open;
                    }
                });
            });
        </script>
    </body>
</html>
