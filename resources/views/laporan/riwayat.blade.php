<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-orange-50 to-indigo-100 dark:from-slate-800 dark:to-slate-900 py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Riwayat Laporan Saya</h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">Kelola dan pantau semua laporan kehilangan yang
                pernah Anda buat.</p>
            <a href="{{ route('laporan.buat') }}"
                class="px-8 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold text-lg">
                + Buat Laporan Baru
            </a>
        </div>
    </section>

    <section class="py-20 px-4 bg-gray-50 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto">

            @if (session('success'))
                <div
                    class="mb-8 p-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                    <p class="text-green-700 dark:text-green-300 font-semibold text-lg">
                        ✓ {{ session('success') }}
                    </p>
                </div>
            @endif

            <div class="mb-8 flex flex-wrap gap-3">
                <a href="{{ route('laporan.saya') }}"
                    class="px-6 py-3 rounded-full font-semibold {{ !$currentStatus ? 'bg-orange-600 text-white' : 'bg-white dark:bg-slate-800 text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700' }} transition shadow-md">
                    Semua ({{ $laporan->total() }})
                </a>
                <a href="{{ route('laporan.saya', ['status' => 'submitted']) }}"
                    class="px-6 py-3 rounded-full font-medium {{ $currentStatus === 'submitted' ? 'bg-orange-600 text-white' : 'bg-white dark:bg-slate-800 text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700' }} transition shadow-md">
                    Submitted
                </a>
                <a href="{{ route('laporan.saya', ['status' => 'verified']) }}"
                    class="px-6 py-3 rounded-full font-medium {{ $currentStatus === 'verified' ? 'bg-orange-600 text-white' : 'bg-white dark:bg-slate-800 text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700' }} transition shadow-md">
                    Verified
                </a>
                <a href="{{ route('laporan.saya', ['status' => 'processing']) }}"
                    class="px-6 py-3 rounded-full font-medium {{ $currentStatus === 'processing' ? 'bg-orange-600 text-white' : 'bg-white dark:bg-slate-800 text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700' }} transition shadow-md">
                    Processing
                </a>
                <a href="{{ route('laporan.saya', ['status' => 'done']) }}"
                    class="px-6 py-3 rounded-full font-medium {{ $currentStatus === 'done' ? 'bg-orange-600 text-white' : 'bg-white dark:bg-slate-800 text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700' }} transition shadow-md">
                    Done
                </a>
                <a href="{{ route('laporan.saya', ['status' => 'rejected']) }}"
                    class="px-6 py-3 rounded-full font-medium {{ $currentStatus === 'rejected' ? 'bg-orange-600 text-white' : 'bg-white dark:bg-slate-800 text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700' }} transition shadow-md">
                    Rejected
                </a>
            </div>
            @if ($laporan->count() > 0)

                <div class="grid grid-cols-1 gap-6">
                    @foreach ($laporan as $item)
                        <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                            <div class="flex flex-col sm:flex-row justify-between sm:items-start gap-4">

                                <!-- Left Content -->
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $item->nama_barang }}
                                        </h3>
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                            @if ($item->status === 'submitted') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300
                                            @elseif($item->status === 'verified')
                                                bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300
                                            @elseif($item->status === 'processing')
                                                bg-orange-100 dark:bg-orange-900/30 text-orange-800 dark:text-orange-300
                                            @elseif($item->status === 'done')
                                                bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300
                                            @elseif($item->status === 'rejected')
                                                bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300
                                            @else
                                                bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300 @endif
                                        ">
                                            @if ($item->status === 'submitted')
                                                ⏳ Submitted
                                            @elseif($item->status === 'verified')
                                                ✓ Verified
                                            @elseif($item->status === 'processing')
                                                🔄 Processing
                                            @elseif($item->status === 'done')
                                                ✅ Done
                                            @elseif($item->status === 'rejected')
                                                ❌ Rejected
                                            @else
                                                {{ ucfirst($item->status) }}
                                            @endif
                                        </span>
                                    </div>

                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                                        <span class="font-medium">Nomor:</span> {{ $item->nomor_laporan }}
                                    </p>

                                    <div
                                        class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-700 dark:text-gray-300 mb-3">
                                        <div>
                                            <span class="font-medium">Kategori:</span>
                                            <span class="text-gray-600 dark:text-gray-400">
                                                {{ $item->kategori?->nama_kategori ?? 'Tidak ada' }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="font-medium">Tanggal:</span>
                                            <span class="text-gray-600 dark:text-gray-400">
                                                {{ $item->tanggal_lapor?->format('d M Y') ?? 'N/A' }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="font-medium">Lokasi:</span>
                                            <span class="text-gray-600 dark:text-gray-400">
                                                {{ $item->lokasi_kehilangan }}
                                            </span>
                                        </div>
                                        <div>
                                            <span class="font-medium">Verifikasi:</span>
                                            @if ($item->verified_at)
                                                <span
                                                    class="text-green-600 dark:text-green-400">{{ $item->verified_at->format('d M Y') }}</span>
                                            @else
                                                <span class="text-yellow-600 dark:text-yellow-400">Belum
                                                    diverifikasi</span>
                                            @endif
                                        </div>
                                    </div>

                                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                        <span class="font-medium">Deskripsi:</span> {{ $item->deskripsi_barang }}
                                    </p>
                                </div>

                                <!-- Right Actions -->
                                <div class="flex flex-col gap-2 sm:w-48">
                                    <a href="{{ route('laporan.detail', $item->id_laporan) }}"
                                        class="px-6 py-3 text-center bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold">
                                        Lihat Detail
                                    </a>
                                    @if ($item->status === 'submitted')
                                        <button type="button"
                                            class="px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 rounded-lg hover:bg-red-200 dark:hover:bg-red-900/50 transition text-sm font-medium cursor-not-allowed"
                                            disabled>
                                            (Tidak bisa diedit)
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Pagination -->
                @if ($laporan->hasPages())
                    <div class="mt-6">
                        {{ $laporan->appends(request()->query())->links() }}
                    </div>
                @endif

                <div class="bg-white dark:bg-slate-800 p-16 rounded-lg shadow-lg text-center">
                    <div class="text-8xl mb-6">📝</div>
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Belum ada laporan</h3>
                    <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">Mulai buat laporan kehilangan Anda sekarang
                    </p>
                    <a href="{{ route('laporan.buat') }}"
                        class="px-8 py-4 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold text-lg">
                        + Buat Laporan Pertama
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
