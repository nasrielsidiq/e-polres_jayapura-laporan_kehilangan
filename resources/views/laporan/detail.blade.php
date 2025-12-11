<x-app-layout>
    <style>
        @media print {

            /* 1. Sembunyikan elemen layout bawaan Laravel (Navigasi & Header Slot Wrapper) */
            nav,
            header,
            .min-h-screen>header {
                display: none !important;
            }

            /* Sembunyikan elemen interaktif lainnya */
            .no-print,
            button,
            form,
            .absolute,
            .flex.justify-between {
                display: none !important;
            }

            /* 2. Reset Margin Halaman & Body */
            @page {
                size: A4;
                margin: 10mm 20mm;
                /* Kurangi margin atas (10mm) jika perlu */
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #000;
                background: #fff;
                margin: 0;
                /* Reset margin body */
                padding: 0;
                border: none;
                /* Hapus border body saat print agar bersih */
            }

            /* 3. Pastikan Container Print naik ke paling atas */
            .py-12 {
                padding-top: 0 !important;
                /* Hapus padding bawaan container utama */
                padding-bottom: 0 !important;
            }

            .max-w-4xl {
                max-width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            /* Print header styling (tetap sama) */
            .print-header {
                text-align: center;
                border-bottom: 2px solid #333;
                padding-bottom: 15px;
                margin-bottom: 20px;
                display: block !important;
                /* Pastikan tidak ada border di header ini jika tidak diinginkan */
            }

            .print-header h1 {
                font-size: 24px;
                font-weight: bold;
                margin: 0 0 5px 0;
            }

            .print-header p {
                margin: 2px 0;
                font-size: 12px;
            }

            /* --- Sisa CSS Anda (Card styles, Grid, dsb) tetap sama --- */
            .print-container {
                max-width: 100%;
                background: white;
                color: black;
            }

            .bg-white {
                background: white !important;
                border: 1px solid #ddd !important;
                page-break-inside: avoid;
                margin-bottom: 15px;
                padding: 15px;
            }

            .dark\:bg-gray-800 {
                background: white !important;
            }

            .text-gray-900,
            .dark\:text-white {
                color: #000 !important;
            }

            .text-gray-600,
            .dark\:text-gray-400 {
                color: #555 !important;
            }

            h2,
            h3 {
                color: #000 !important;
                font-size: 16px;
                font-weight: bold;
                margin-top: 10px;
                margin-bottom: 10px;
                page-break-after: avoid;
            }

            .grid {
                display: block !important;
            }

            .grid>div {
                display: block;
                margin-bottom: 10px;
                page-break-inside: avoid;
            }

            .inline-block {
                display: inline-block !important;
                padding: 5px 10px !important;
                border: 1px solid #999 !important;
            }

            .grid.grid-cols-2 {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 10px;
            }

            .relative.group img {
                max-width: 100%;
                height: auto;
                border: 1px solid #ddd;
            }

            .print-footer {
                margin-top: 30px;
                padding-top: 15px;
                border-top: 1px solid #ddd;
                font-size: 11px;
                text-align: center;
                page-break-inside: avoid;
            }

            [class*="dark:"] {
                background: transparent !important;
                color: inherit !important;
            }

            /* Hapus shadow saat print agar lebih bersih */
            .shadow-sm {
                box-shadow: none !important;
            }
        }
    </style>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Laporan: ') . $lap->nomor_laporan }}
            </h2>
            <a href="{{ route('laporan.saya') }}"
                class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Print Header (hanya untuk cetak) -->
            <div class="print-header" style="display: none;">
                <h1>LAPORAN KEHILANGAN</h1>
                <p><strong>Nomor Laporan:</strong> {{ $lap->nomor_laporan }}</p>
                <p>Tanggal Lapor: {{ $lap->tanggal_lapor ?? '-' }}</p>
            </div>

            <!-- Status Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Status Laporan</p>
                        <span
                            class="inline-block px-4 py-2 text-sm font-semibold rounded-full
                            @if ($lap->status === 'submitted') bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300
                            @elseif($lap->status === 'verified')
                                bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300
                            @elseif($lap->status === 'processing')
                                bg-orange-100 dark:bg-orange-900/30 text-orange-800 dark:text-orange-300
                            @elseif($lap->status === 'done')
                                bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300
                            @elseif($lap->status === 'found')
                                bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-300
                            @elseif($lap->status === 'rejected')
                                bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300
                            @else
                                bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300 @endif
                        ">
                            @if ($lap->status === 'submitted')
                                ⏳ Menunggu Verifikasi
                            @elseif($lap->status === 'verified')
                                ✓ Terverifikasi
                            @elseif($lap->status === 'processing')
                                🔄 Sedang Diproses
                            @elseif($lap->status === 'done')
                                ✅ Laporan Selesai
                            @elseif($lap->status === 'found')
                                🎉 Barang Ditemukan
                            @elseif($lap->status === 'rejected')
                                ❌ Laporan Ditolak
                            @else
                                {{ ucfirst($lap->status) }}
                            @endif
                        </span>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Nomor Laporan</p>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $lap->nomor_laporan }}</p>
                        @if($lap->submission_count > 1)
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pengajuan ke-{{ $lap->submission_count }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Informasi Barang -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl">📦</span> Informasi Barang
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Nama Barang</p>
                        <p class="text-lg text-gray-900 dark:text-white mt-1 font-semibold">{{ $lap->nama_barang }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Kategori</p>
                        <p class="text-lg text-gray-900 dark:text-white mt-1">
                            {{ $lap->kategori?->nama_kategori ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Deskripsi Barang</p>
                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $lap->deskripsi_barang }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Kehilangan -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl">📍</span> Informasi Kehilangan
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Lokasi</p>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $lap->lokasi_kehilangan }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tanggal</p>
                        <p class="text-gray-900 dark:text-white mt-1">
                            {{ $lap->tanggal_lapor }}
                            @if ($lap->waktu_kehilangan)
                                Pukul {{ $lap->waktu_kehilangan }}
                            @endif
                        </p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Kronologi</p>
                        <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $lap->kronologi }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Pelapor -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl">👤</span> Informasi Pelapor
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Nama</p>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $lap->user->nama_lengkap }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Email</p>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $lap->user->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Nomor Telepon</p>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $lap->user->no_hp ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tanggal Lapor</p>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $lap->tanggal_lapor }}</p>
                    </div>
                </div>
            </div>

            <!-- Verifikasi Info -->
            @if ($lap->verified_at || $lap->selesai_at)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="text-2xl">✓</span> Informasi Verifikasi
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if ($lap->verified_at)
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Diverifikasi Oleh</p>
                                <p class="text-gray-900 dark:text-white mt-1">{{ $lap->verifikator?->name ?? 'Admin' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tanggal Verifikasi</p>
                                <p class="text-gray-900 dark:text-white mt-1">{{ $lap->verified_at }}</p>
                            </div>
                        @endif
                        @if ($lap->selesai_at)
                            <div class="md:col-span-2">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tanggal Selesai</p>
                                <p class="text-gray-900 dark:text-white mt-1">{{ $lap->selesai_at }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Lampiran -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl">📎</span> Lampiran
                </h3>

                @if ($lap->getMedia('lampiran')->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @foreach ($lap->getMedia('lampiran') as $media)
                            <div class="relative group">
                                @if ($media->mime_type && str_contains($media->mime_type, 'image'))
                                    <a href="{{ asset('storage/' . $media->id . '/' . $media->file_name) }}"
                                        target="_blank" class="block">
                                        <img src="{{ asset('storage/' . $media->id . '/' . $media->file_name) }}"
                                            alt="Lampiran"
                                            class="w-full h-32 object-cover rounded-lg hover:opacity-75 transition"
                                            onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-32 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center&quot;><div class=&quot;text-center&quot;><span class=&quot;text-3xl mb-2 block&quot;>❌</span><p class=&quot;text-xs text-gray-600 dark:text-gray-400&quot;>Gambar Error</p></div></div>'">
                                    </a>
                                @else
                                    <a href="{{ asset('storage/' . $media->id . '/' . $media->file_name) }}"
                                        target="_blank"
                                        class="w-full h-32 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-600 transition block">
                                        <div class="text-center">
                                            <span class="text-3xl mb-2 block">📄</span>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 truncate px-2">
                                                {{ $media->file_name }}</p>
                                        </div>
                                    </a>
                                @endif
                                <div
                                    class="absolute inset-0 bg-black/50 rounded-lg opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                    <a href="{{ asset('storage/' . $media->id . '/' . $media->file_name) }}" download
                                        class="text-white text-sm font-medium px-3 py-1 bg-blue-600 rounded hover:bg-blue-700">
                                        Download
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-600 dark:text-gray-400">Tidak ada lampiran</p>
                    </div>
                @endif

                <!-- Upload Lampiran Tambahan -->
                @if ($lap->status === 'submitted' || $lap->status === 'verified')
                    <form method="POST" action="{{ route('laporan.lampiran', $lap->id_laporan) }}"
                        enctype="multipart/form-data"
                        class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 no-print">
                        @csrf
                        <label class="text-sm font-medium text-gray-600 dark:text-gray-400 block mb-3">Tambah
                            Lampiran</label>
                        <div class="flex gap-2">
                            <input type="file" name="file" accept=".jpg,.jpeg,.png,.pdf"
                                class="flex-1 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-sm focus:border-blue-500 focus:ring-blue-500">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                                Upload
                            </button>
                        </div>
                        @if ($errors->has('file'))
                            <p class="text-red-600 dark:text-red-400 text-xs mt-2">{{ $errors->first('file') }}</p>
                        @endif
                    </form>
                @endif
            </div>

            <!-- Riwayat Proses -->
            @if ($lap->riwayat()->count() > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                        <span class="text-2xl">📋</span> Riwayat Proses
                    </h3>
                    <div class="space-y-4">
                        @foreach ($lap->riwayat()->latest()->get() as $item)
                            <div class="flex gap-4">
                                <div class="flex flex-col items-center">
                                    <div class="w-4 h-4 bg-blue-600 rounded-full mt-2"></div>
                                    @if (!$loop->last)
                                        <div class="w-1 h-12 bg-gray-300 dark:bg-gray-600"></div>
                                    @endif
                                </div>
                                <div class="pb-6">
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $item->catatan }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $item->waktu }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Actions -->
            <div class="flex justify-between gap-3 no-print">
                <a href="{{ route('laporan.saya') }}"
                    class="flex-1 px-4 py-2 text-center bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-white rounded-lg hover:bg-gray-400 dark:hover:bg-gray-500 transition font-medium">
                    Kembali
                </a>
                <button onclick="window.print()"
                    class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                    🖨️ Cetak
                </button>
            </div>

            <!-- Print Footer -->
            <div class="print-footer">
                <p><strong>Laporan Kehilangan E-Polres</strong></p>
                <p>Dicetak pada: {{ now() }}</p>
                <p>{{ config('app.name') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
