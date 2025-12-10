<aside class="hidden md:flex flex-col fixed left-0 md:top-16 md:bottom-0 z-40 w-64 bg-gray-900 shadow-md">
    {{-- <div class="p-4 border-b flex items-center gap-3">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <span class="flex items-center justify-center w-9 h-9 rounded-md bg-orange-400 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
            </span>
            <span class="text-lg font-semibold text-orange-400">Admin Panel</span>
        </a>
    </div> --}}

    <nav class="p-4 flex-1 overflow-y-auto">
        <h3 class="text-gray-500 text-xs font-semibold uppercase mb-3">Main Menu</h3>

        <ul class="space-y-1">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'bg-orange-400 text-white font-medium' : 'text-white hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>



            <li>
                <a href="{{ route('admin.pelapor.index') }}"
                   class="{{ request()->routeIs('admin.pelapor.*') ? 'bg-orange-400 text-white font-medium' : 'text-white hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.598 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Kelola Pelapor</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.kategori.index') }}"
                   class="{{ request()->routeIs('admin.kategori.*') ? 'bg-orange-400 text-white font-medium' : 'text-white hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                    <span>Kategori Barang</span>
                </a>
            </li>

            @if(auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('admin.petugas.index') }}"
                   class="{{ request()->routeIs('admin.petugas.*') ? 'bg-orange-400 text-white font-medium' : 'text-white hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c2.761 0 5-2.239 5-5S14.761 1 12 1 7 3.239 7 6s2.239 5 5 5zM3 21v-2a4 4 0 014-4h10a4 4 0 014 4v2" />
                    </svg>
                    <span>Kelola Petugas</span>
                </a>
            </li>
            @endif

            <li>
                <a href="{{ route('admin.berita-acara.index') }}"
                   class="{{ request()->routeIs('admin.berita-acara.*') ? 'bg-orange-400 text-white font-medium' : 'text-white hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>Berita Acara</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.arsip.index') }}"
                   class="{{ request()->routeIs('admin.arsip.*') ? 'bg-orange-400 text-white font-medium' : 'text-white hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 px-3 py-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h10M7 11h10M7 15h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Arsip Laporan</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="p-4 border-t border-gray-700 text-xs text-gray-500">
        <div class="mb-1">Masuk sebagai</div>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-orange-400 text-white rounded-full flex items-center justify-center text-sm font-medium">
                {{ strtoupper(substr(auth()->user()->nama_lengkap ?? auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
            <div class="flex-1">
                <div class="text-sm text-gray-800">{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</div>
                <div class="text-xs text-gray-500">{{ auth()->user()->getRoleNames()->first() ?? 'Pengguna' }}</div>
            </div>
        </div>

        <div class="mt-3 text-center">
            <a href="{{ route('admin.pengaturan.index') ?? '#' }}" class="text-orange-400 hover:underline text-sm">Pengaturan</a>
        </div>

        <div class="mt-3 text-center text-gray-400">
            © {{ date('Y') }} e-Polres
        </div>
    </div>
</aside>
