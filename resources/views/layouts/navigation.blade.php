@if(Auth::check() && Auth::user()->hasAnyRole(['admin', 'petugas']))
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-sm">
        <!-- Admin/Petugas Navigation -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-15 h-10">
                            <span class="font-bold text-gray-900 dark:text-white hidden sm:inline">Admin Panel</span>
                        </a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->nama_lengkap }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">{{ __('Edit Profil') }}</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Keluar') }}</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </nav>
@else
    <!-- Guest/Pelapor Navigation -->
    <nav class="bg-white dark:bg-slate-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex text-2xl font-bold text-orange-600 dark:text-orange-400">
                    <img src="{{ asset('logo.png') }}" alt="Logo polrestas papua" class="w-15 h-10"> Laporan Kehilangan
                </a>
                <div class="flex space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">Dashboard</a>
                        @if(Auth::user()->hasRole('pelapor'))
                            <a href="{{ route('laporan.saya') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">Laporan Saya</a>
                        @endif
                    @endauth
                    <a href="{{ route('status.cek') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">Cek Status</a>
                    <a href="{{ route('panduan') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">Panduan</a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">Keluar</button>
                        </form>
                    @else
                        @if(request()->routeIs('login'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition">Daftar</a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition">Masuk</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>
@endif
