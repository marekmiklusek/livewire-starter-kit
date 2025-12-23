<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-white antialiased" x-data="{ sidebarOpen: true }">
    <!-- Animated Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-1/2 -left-1/2 w-full h-full bg-linear-br from-blue-900/20 via-transparent to-transparent rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-1/2 -right-1/2 w-full h-full bg-linear-to-tl from-teal-900/20 via-transparent to-transparent rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-1/2 h-1/2 bg-linear-to-r from-emerald-900/10 to-blue-900/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-50 flex flex-col bg-gray-900/95 backdrop-blur-xl border-r border-white/5 transition-all duration-300 overflow-hidden"
            :class="sidebarOpen ? 'w-64' : 'w-0 border-r-0'"
        >
            <!-- Logo -->
            <div class="flex items-center h-16 px-4 border-b border-white/5">
                <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-linear-br from-blue-500 via-teal-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/20 shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span
                        class="text-lg font-semibold bg-linear-to-r from-white to-gray-400 bg-clip-text text-transparent whitespace-nowrap overflow-hidden transition-all duration-300"
                        :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'"
                    >
                        {{ config('app.name') }}
                    </span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                <a
                    href="{{ route('dashboard') }}"
                    wire:navigate
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-blue-500/20 text-blue-400' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}"
                >
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-all duration-300">Dashboard</span>
                </a>

                <a
                    href="{{ route('sample') }}"
                    wire:navigate
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('sample') ? 'bg-blue-500/20 text-blue-400' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}"
                >
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-all duration-300">Sample Page</span>
                </a>

                <div class="pt-4 mt-4 border-t border-white/5">
                    <p
                        class="px-3 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                        :class="sidebarOpen ? 'opacity-100' : 'opacity-0'"
                    >
                        Account
                    </p>

                    <a
                        href="{{ route('profile') }}"
                        wire:navigate
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('profile') ? 'bg-blue-500/20 text-blue-400' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}"
                    >
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-all duration-300">Profile</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button
                            type="submit"
                            class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-gray-400 hover:bg-red-500/10 hover:text-red-400 transition-all"
                        >
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-all duration-300">Logout</span>
                        </button>
                    </form>
                </div>
            </nav>

            <!-- User -->
            <div class="p-3 border-t border-white/5">
                <div class="flex items-center gap-3 px-3 py-2 rounded-xl bg-white/5">
                    <div class="w-8 h-8 rounded-full bg-linear-br from-blue-500 to-teal-500 flex items-center justify-center text-white text-xs font-semibold shrink-0">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-all duration-300 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>

        </aside>

        <!-- Toggle Button -->
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="fixed z-50 top-5 w-8 h-8 bg-gray-800 border border-white/10 rounded-full flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300 shadow-lg"
            :class="sidebarOpen ? 'left-60' : 'left-6'"
        >
            <svg
                class="w-4 h-4 transition-transform duration-300"
                :class="sidebarOpen ? '' : 'rotate-180'"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Main Content -->
        <main
            class="flex-1 transition-all duration-300"
            :class="sidebarOpen ? 'ml-64' : 'ml-0 pl-14'"
        >
            {{ $slot }}
        </main>
    </div>
</body>
</html>
