<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-orange-50 to-indigo-100 dark:from-slate-800 dark:to-slate-900 py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Status Laporan</h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-6">{{ $lap->nomor_laporan }}</p>
            <a href="{{ route('status.cek') }}" class="px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold">
                ← Cari Laporan Lain
            </a>
        </div>
    </section>

    <!-- Status Section -->
    <section class="py-16 px-4 bg-white dark:bg-slate-800">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg text-center mb-12">
                <div class="text-8xl mb-6">
                    @if($lap->status === 'submitted') ⏳
                    @elseif($lap->status === 'verified') ✅
                    @elseif($lap->status === 'processing') 🔄
                    @elseif($lap->status === 'done') 🎉
                    @elseif($lap->status === 'found') 🎊
                    @elseif($lap->status === 'rejected') ❌
                    @else 📋
                    @endif
                </div>
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    @if($lap->status === 'submitted') Menunggu Verifikasi
                    @elseif($lap->status === 'verified') Terverifikasi
                    @elseif($lap->status === 'processing') Sedang Diproses
                    @elseif($lap->status === 'done') Laporan Selesai
                    @elseif($lap->status === 'found') Barang Ditemukan
                    @elseif($lap->status === 'rejected') Laporan Ditolak
                    @else {{ ucfirst($lap->status) }}
                    @endif
                </h2>
                <p class="text-xl font-mono text-orange-600 dark:text-orange-400">{{ $lap->nomor_laporan }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">📦</div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Informasi Barang</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="font-medium text-gray-600 dark:text-gray-400">Nama Barang</p>
                            <p class="text-lg text-gray-900 dark:text-white font-semibold">{{ $lap->nama_barang }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600 dark:text-gray-400">Kategori</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $lap->kategori?->nama_kategori ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600 dark:text-gray-400">Lokasi Hilang</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $lap->lokasi_kehilangan }}</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600 dark:text-gray-400">Tanggal Lapor</p>
                            <p class="text-lg text-gray-900 dark:text-white">{{ $lap->tanggal_lapor->locale('id')->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition">
                    <div class="text-4xl mb-4">📋</div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Progress Laporan</h3>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">✓</div>
                            <div class="flex-1">
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Dibuat</p>
                                <p class="text-gray-600 dark:text-gray-400">{{ $lap->tanggal_lapor->locale('id')->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 {{ $lap->verified_at ? 'bg-green-500' : 'bg-gray-300' }} rounded-full flex items-center justify-center text-white font-bold">
                                {{ $lap->verified_at ? '✓' : '2' }}
                            </div>
                            <div class="flex-1">
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">Verifikasi Petugas</p>
                                <p class="text-gray-600 dark:text-gray-400">
                                    @if($lap->verified_at)
                                        Diverifikasi pada {{ $lap->verified_at->locale('id')->translatedFormat('d F Y H:i') }}
                                    @else
                                        Menunggu verifikasi petugas
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 {{ $lap->selesai_at ? 'bg-green-500' : 'bg-gray-300' }} rounded-full flex items-center justify-center text-white font-bold">
                                {{ $lap->selesai_at ? '✓' : '3' }}
                            </div>
                            <div class="flex-1">
                                <p class="text-lg font-semibold text-gray-900 dark:text-white">Laporan Selesai</p>
                                <p class="text-gray-600 dark:text-gray-400">
                                    @if($lap->selesai_at)
                                        Diselesaikan pada {{ $lap->selesai_at->locale('id')->translatedFormat('d F Y H:i') }}
                                    @else
                                        Belum selesai
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($lap->riwayat()->count() > 0)
                <div class="bg-white dark:bg-slate-800 p-8 rounded-lg shadow-lg hover:shadow-xl transition mt-8">
                    <div class="text-4xl mb-4">📝</div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Riwayat Proses</h3>
                    <div class="space-y-4">
                        @foreach($lap->riwayat()->latest()->get() as $item)
                            <div class="flex gap-4 p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg">
                                <div class="w-3 h-3 bg-orange-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $item->catatan }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($item->waktu)->locale('id')->translatedFormat('d F Y H:i') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex gap-4 mt-12">
                <a href="{{ route('status.cek') }}" class="flex-1 px-6 py-3 text-center bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition font-semibold">
                    ← Cari Laporan Lain
                </a>
                <a href="{{ route('laporan.cetak', $lap->nomor_laporan) }}" target="_blank" class="flex-1 px-6 py-3 text-center bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition font-semibold">
                    🖨️ Cetak Bukti
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
