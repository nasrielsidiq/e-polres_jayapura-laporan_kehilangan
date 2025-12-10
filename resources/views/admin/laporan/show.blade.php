@extends('layouts.admin.app')

@section('title', "Detail Laporan — {$lap->nomor_laporan}")

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Laporan: {{ $lap->nomor_laporan }}</h2>
            <div class="text-sm text-gray-500">Dibuat: {{ $lap->tanggal_lapor ? date('Y-m-d H:i', strtotime($lap->tanggal_lapor)) : '-' }}</div>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.laporan.cetak', $lap->nomor_laporan) }}" target="_blank" class="px-3 py-2 bg-gray-100 rounded text-sm">Cetak</a>
            @if($lap->status === 'submitted')
                <span class="px-3 py-2 bg-yellow-100 text-yellow-800 rounded text-sm font-medium">Menunggu Verifikasi</span>
            @elseif($lap->status === 'verified')
                <span class="px-3 py-2 bg-blue-100 text-blue-800 rounded text-sm font-medium">Terverifikasi</span>
            @elseif($lap->status === 'processing')
                <span class="px-3 py-2 bg-orange-100 text-orange-800 rounded text-sm font-medium">Sedang Diproses</span>
            @elseif($lap->status === 'done')
                <span class="px-3 py-2 bg-green-100 text-green-800 rounded text-sm font-medium">Selesai</span>
            @elseif($lap->status === 'found')
                <span class="px-3 py-2 bg-emerald-100 text-emerald-800 rounded text-sm font-medium">Ditemukan</span>
            @elseif($lap->status === 'rejected')
                <span class="px-3 py-2 bg-red-100 text-red-800 rounded text-sm font-medium">Ditolak</span>
            @endif
        </div>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-6 space-y-4">
            @if(session('success'))
            <div class="p-3 bg-green-100 border border-green-400 text-green-700 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h3 class="text-xs text-gray-500 uppercase">Nama Barang</h3>
                    <div class="text-sm text-gray-800">{{ $lap->nama_barang }}</div>
                </div>
                <div>
                    <h3 class="text-xs text-gray-500 uppercase">Kategori</h3>
                    <div class="text-sm text-gray-800">{{ $lap->kategori->nama_kategori ?? '-' }}</div>
                </div>

                <div>
                    <h3 class="text-xs text-gray-500 uppercase">Lokasi Kehilangan</h3>
                    <div class="text-sm text-gray-800">{{ $lap->lokasi_kehilangan }}</div>
                </div>
                <div>
                    <h3 class="text-xs text-gray-500 uppercase">Waktu Kehilangan</h3>
                    <div class="text-sm text-gray-800">{{ $lap->waktu_kehilangan ? date('Y-m-d H:i', strtotime($lap->waktu_kehilangan)) : '-' }}</div>
                </div>
            </div>

            <div>
                <h3 class="text-xs text-gray-500 uppercase">Deskripsi / Kronologi</h3>
                <div class="prose text-sm text-gray-800 whitespace-pre-line">{{ $lap->deskripsi_barang ?? $lap->kronologi ?? '-' }}</div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <h3 class="text-xs text-gray-500 uppercase">Status</h3>
                    <div class="text-sm font-medium text-indigo-600">
                        @if($lap->status === 'submitted') Menunggu Verifikasi
                        @elseif($lap->status === 'verified') Terverifikasi
                        @elseif($lap->status === 'processing') Sedang Diproses
                        @elseif($lap->status === 'done') Selesai
                        @elseif($lap->status === 'found') Ditemukan
                        @elseif($lap->status === 'rejected') Ditolak
                        @else {{ ucfirst($lap->status) }}
                        @endif
                    </div>
                </div>
                <div>
                    <h3 class="text-xs text-gray-500 uppercase">Diverifikasi Oleh</h3>
                    <div class="text-sm text-gray-800">{{ $lap->verified_by ? 'Petugas' : '-' }}</div>
                </div>
                <div>
                    <h3 class="text-xs text-gray-500 uppercase">Tanggal Selesai</h3>
                    <div class="text-sm text-gray-800">{{ $lap->selesai_at ? date('Y-m-d H:i', strtotime($lap->selesai_at)) : '-' }}</div>
                </div>
            </div>

            <!-- Verification Form -->
            @if($lap->status === 'submitted')
            <div class="border-t pt-4">
                <h3 class="text-sm font-semibold text-gray-800 mb-3">Verifikasi Laporan</h3>
                <form method="POST" action="{{ route('admin.laporan.verifikasi', $lap->id_laporan) }}" class="space-y-3">
                    @csrf
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Catatan Verifikasi (Opsional)</label>
                        <textarea name="catatan" rows="2" class="w-full px-3 py-2 border rounded text-sm" placeholder="Tambahkan catatan jika diperlukan"></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded text-sm hover:bg-green-700" onclick="return confirm('Verifikasi laporan ini?')">Verifikasi Laporan</button>
                </form>
            </div>
            @endif

            <!-- Status Update Form -->
            @if(in_array($lap->status, ['verified', 'processing']))
            <div class="border-t pt-4">
                <h3 class="text-sm font-semibold text-gray-800 mb-3">Update Status</h3>
                <form method="POST" action="{{ route('admin.laporan.update', $lap->id_laporan) }}" class="space-y-3">
                    @csrf
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Status Baru</label>
                        <select name="status" class="w-full px-3 py-2 border rounded text-sm" required>
                            <option value="">-- Pilih Status --</option>
                            @if($lap->status === 'verified')
                                <option value="processing">Sedang Diproses</option>
                                <option value="rejected">Ditolak</option>
                            @elseif($lap->status === 'processing')
                                <option value="done">Selesai</option>
                                <option value="found">Ditemukan</option>
                                <option value="rejected">Ditolak</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-gray-600 mb-1">Catatan</label>
                        <textarea name="catatan" rows="2" class="w-full px-3 py-2 border rounded text-sm" placeholder="Catatan perubahan status" required></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded text-sm hover:bg-blue-700" onclick="return confirm('Perbarui status laporan?')">Perbarui Status</button>
                </form>
            </div>
            @endif

            @if(session('success'))
            <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            <!-- Berita Acara Section -->
            @if(in_array($lap->status, ['done', 'found']))
            <div class="border-t pt-4">
                <h3 class="text-sm font-semibold text-gray-800 mb-3">Berita Acara</h3>
                @php
                    $beritaAcara = \App\Models\BeritaAcara::where('id_laporan', $lap->id_laporan)->first();
                @endphp
                @if($beritaAcara)
                    <div class="flex gap-2">
                        <a href="{{ route('admin.berita-acara.show', $beritaAcara->id) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">
                            Lihat Berita Acara
                        </a>
                        <a href="{{ route('admin.berita-acara.print', $beritaAcara->id) }}" 
                           class="px-4 py-2 bg-green-600 text-white rounded text-sm hover:bg-green-700" target="_blank">
                            Print PDF
                        </a>
                    </div>
                @else
                    <a href="{{ route('admin.berita-acara.create', $lap->id_laporan) }}" 
                       class="px-4 py-2 bg-orange-600 text-white rounded text-sm hover:bg-orange-700">
                        Buat Berita Acara
                    </a>
                @endif
            </div>
            @endif

            <div class="flex justify-end gap-2 border-t pt-4">
                <a href="{{ route('admin.laporan.index') }}" class="px-3 py-2 bg-gray-100 rounded text-sm">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
