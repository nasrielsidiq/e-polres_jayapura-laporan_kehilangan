<nav class="fixed top-0 left-0 right-0 z-50 bg-gray-900 border-b border-gray-800 h-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex items-center justify-between h-full">

            {{-- LEFT: App Name / Logo --}}
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.dashboard') }}"
                   class="text-lg font-semibold text-orange-400 hover:text-orange-300 flex items-center gap-3">
                    <img src="logo.png" alt="" class="w-15 h-10">
                    <span>Admin Panel</span>
                </a>

                {{-- small nav links --}}
                <div class="hidden md:flex space-x-4 text-sm text-orange-300">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-orange-200">Dashboard</a>
                    <a href="#" class="hover:text-orange-200">Laporan</a>
                </div>
            </div>

            {{-- RIGHT: User Profile --}}
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    {{-- avatar (initial) --}}
                    <div class="w-9 h-9 bg-orange-500 text-blue-900 rounded-full flex items-center justify-center text-sm font-medium">
                        {{ strtoupper(substr(auth()->user()->nama_lengkap ?? auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>

                    <div class="hidden sm:block text-right">
                        <div class="text-sm font-medium text-orange-200">
                            {{ auth()->user()->nama_lengkap ?? auth()->user()->name }}
                        </div>
                        <div class="text-xs text-orange-300">
                            {{ auth()->user()->getRoleNames()->first() ?? 'Pengguna' }}
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="px-3 py-1 border border-orange-400 rounded text-sm text-orange-300 hover:bg-orange-600 hover:text-blue-900 transition">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>
