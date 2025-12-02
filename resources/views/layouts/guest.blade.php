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
    </head>
    <body class="font-sans antialiased bg-white dark:bg-slate-900">
        <!-- Navigation Top -->
        <nav class="bg-white dark:bg-slate-800 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <a href="/" class=" flex text-2xl font-bold text-orange-600 dark:text-orange-400">
                        <img src="logo.png" alt="Logo polrestas papua" class="w-15 h-10"> Laporan Kehilangan
                    </a>
                    <div class="flex space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">Masuk</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md">
                <!-- Logo/Title -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ config('app.name', 'Laravel') }}</h1>
                    <p class="text-gray-600 dark:text-gray-400">Sistem Pelaporan Kehilangan Barang</p>
                </div>

                <!-- Card -->
                <div class="bg-white dark:bg-slate-800 shadow-lg rounded-lg p-8 border border-gray-200 dark:border-slate-700">
                    {{ $slot }}
                </div>

                <!-- Footer Links -->
                <div class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
                    <p>© 2024 Sistem Pelaporan Kehilangan. <a href="/" class="text-orange-600 dark:text-orange-400 hover:underline">Kembali ke Beranda</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
