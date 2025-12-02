<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-orange-50 to-indigo-100 dark:from-slate-800 dark:to-slate-900 py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Dashboard Pelapor</h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">Selamat datang, {{ Auth::user()->nama_lengkap }}! Kelola laporan kehilangan Anda dengan mudah.</p>
            <a href="{{ route('laporan.buat') }}" class="px-8 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold text-lg">
                + Buat Laporan Baru
            </a>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-white dark:bg-slate-800 py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8 text-center mb-12">

                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">📝</div>
                    <p class="text-4xl font-bold text-orange-600 dark:text-orange-400">{{ $totalLaporan }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Total Laporan</p>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">⏳</div>
                    <p class="text-4xl font-bold text-yellow-600 dark:text-yellow-400">{{ $menunggu }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Menunggu Verifikasi</p>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">✅</div>
                    <p class="text-4xl font-bold text-blue-600 dark:text-blue-400">{{ $terverifikasi }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Terverifikasi</p>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">🎉</div>
                    <p class="text-4xl font-bold text-green-600 dark:text-green-400">{{ $selesai }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Laporan Selesai</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 px-4 bg-gray-50 dark:bg-slate-900">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">📊</div>
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Status Laporan</h3>
                        <div class="space-y-4">
                            @php
                                $statusArray = [
                                    ['label' => 'Menunggu Verifikasi', 'value' => $menunggu, 'color' => 'bg-yellow-500', 'percent' => $totalLaporan > 0 ? round(($menunggu / $totalLaporan) * 100) : 0],
                                    ['label' => 'Terverifikasi', 'value' => $terverifikasi, 'color' => 'bg-blue-500', 'percent' => $totalLaporan > 0 ? round(($terverifikasi / $totalLaporan) * 100) : 0],
                                    ['label' => 'Selesai', 'value' => $selesai, 'color' => 'bg-green-500', 'percent' => $totalLaporan > 0 ? round(($selesai / $totalLaporan) * 100) : 0],
                                ];
                            @endphp
                            @foreach($statusArray as $status)
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $status['label'] }}</span>
                                        <span class="text-sm font-bold text-gray-900 dark:text-white">{{ $status['value'] }} ({{ $status['percent'] }}%)</span>
                                    </div>
                                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                        <div class="{{ $status['color'] }} h-2 rounded-full" style="width: {{ $status['percent'] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <div class="text-4xl mb-2">📋</div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Laporan Terbaru</h3>
                            </div>
                            <a href="{{ route('laporan.saya') }}" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-medium">
                                Lihat Semua →
                            </a>
                        </div>
                        <div class="space-y-3">
                            @if($recentLaporan->count() > 0)
                                @foreach($recentLaporan as $laporan)
                                    <div class="border-l-4 border-blue-500 pl-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition rounded-r">
                                        <div class="flex justify-between items-start gap-2">
                                            <div class="flex-1">
                                                <p class="font-medium text-gray-900 dark:text-white">{{ $laporan->nama_barang }}</p>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $laporan->nomor_laporan }}</p>
                                                {{-- <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">{{ $laporan->tanggal_lapor->format('d M Y') }}</p> --}}
                                            </div>
                                            <span class="inline-block px-2 py-1 text-xs font-semibold rounded
                                                @if($laporan->status === 'pending') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300
                                                @elseif($laporan->status === 'verified') bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300
                                                @elseif($laporan->status === 'selesai') bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300
                                                @else bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300
                                                @endif
                                            ">
                                                @if($laporan->status === 'pending') ⏳
                                                @elseif($laporan->status === 'verified') ✓
                                                @elseif($laporan->status === 'selesai') ✓✓
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                    <p class="mb-2">Belum ada laporan</p>
                                    <a href="{{ route('laporan.buat') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                                        Buat laporan pertama →
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-8">

                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">⚡</div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="{{ route('laporan.buat') }}" class="block w-full px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-medium text-center">
                                Buat Laporan Baru
                            </a>
                            <a href="{{ route('laporan.saya') }}" class="block w-full px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition font-medium text-center">
                                Lihat Riwayat
                            </a>
                            <a href="{{ route('status.cek') }}" class="block w-full px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition font-medium text-center">
                                Cek Status
                            </a>
                            <a href="{{ route('profile.edit') }}" class="block w-full px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition font-medium text-center">
                                Edit Profil
                            </a>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                        <div class="text-4xl mb-4">👤</div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Profil Anda</h3>
                        <div class="space-y-3">
                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-600 dark:text-gray-400 font-medium">Nama</p>
                                <p class="text-gray-900 dark:text-white font-medium">{{ Auth::user()->nama_lengkap }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-600 dark:text-gray-400 font-medium">Nomor HP</p>
                                <p class="text-gray-900 dark:text-white font-medium">{{ Auth::user()->no_hp }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-600 dark:text-gray-400 font-medium">Email</p>
                                <p class="text-gray-900 dark:text-white font-medium break-all text-sm">{{ Auth::user()->email ?? 'Belum diisi' }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-600 dark:text-gray-400 font-medium">Member Sejak</p>
                                {{-- <p class="text-gray-900 dark:text-white font-medium">{{ Auth::user()->created_at->format('d M Y') }}</p> --}}
                            </div>
                        </div>
                    </div>

                    <div class="bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg p-6">
                        <div class="flex gap-3">
                            <span class="text-3xl">ℹ️</span>
                            <div>
                                <p class="font-semibold text-orange-900 dark:text-orange-100 mb-2">Panduan Penggunaan</p>
                                <p class="text-sm text-orange-800 dark:text-orange-200 mb-3">
                                    Buat laporan kehilangan, pantau status verifikasi, dan kelola lampiran dengan mudah melalui dashboard ini.
                                </p>
                                <a href="{{ route('panduan') }}" class="text-sm font-medium text-orange-600 dark:text-orange-400 hover:underline">
                                    Pelajari lebih lanjut →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                <div class="text-4xl mb-4">📍</div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Aktivitas Terbaru</h3>
                @if($activityLogs->count() > 0)
                    <div class="space-y-3 max-h-96 overflow-y-auto">
                        @foreach($activityLogs as $log)
                            <div class="flex items-start gap-3 pb-3 border-b border-gray-200 dark:border-gray-700 last:border-0">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900 dark:text-white">{{ $log->aktivitas }}</p>
                                    {{-- <p class="text-xs text-gray-600 dark:text-gray-400">{{ $log->created_at->format('d M Y H:i') }}</p> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <p>Belum ada aktivitas</p>
                    </div>
                @endif
            </div>

        </div>
    </section>
</x-app-layout>
