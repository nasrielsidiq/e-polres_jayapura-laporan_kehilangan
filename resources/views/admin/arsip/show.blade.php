@extends('layouts.admin.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Laporan Arsip</h1>
                <p class="text-gray-600 text-sm mt-1">{{ $arsip->nomor_laporan }}</p>
            </div>
            <a href="{{ route('admin.arsip.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium">
                ← Kembali
            </a>
        </div>

        <!-- Status Badge -->
        <div class="mb-6">
            @php
                $statusClasses = [
                    'done' => 'bg-green-100 text-green-800',
                    'found' => 'bg-blue-100 text-blue-800',
                    'rejected' => 'bg-red-100 text-red-800',
                ];
                $statusLabels = [
                    'done' => 'Selesai',
                    'found' => 'Ditemukan',
                    'rejected' => 'Ditolak'
                ];
                $class = $statusClasses[$arsip->status] ?? 'bg-gray-100 text-gray-800';
            @endphp
            <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $class }}">
                {{ $statusLabels[$arsip->status] ?? ucfirst($arsip->status) }}
            </span>
        </div>

        <!-- Main Content -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Informasi Pelapor -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pelapor</h3>
                    <dl class="space-y-3 text-sm">
                        <div>
                            <dt class="text-gray-600 font-medium">Nama</dt>
                            <dd class="text-gray-900">{{ $arsip->user->nama_lengkap ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-600 font-medium">Email</dt>
                            <dd class="text-gray-900">{{ $arsip->user->email ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-600 font-medium">Telepon</dt>
                            <dd class="text-gray-900">{{ $arsip->user->no_hp ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-600 font-medium">Alamat</dt>
                            <dd class="text-gray-900">{{ $arsip->user->alamat ?? 'N/A' }}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Informasi Laporan -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Laporan</h3>
                    <dl class="space-y-3 text-sm">
                        <div>
                            <dt class="text-gray-600 font-medium">Nomor Laporan</dt>
                            <dd class="text-gray-900 font-mono">{{ $arsip->nomor_laporan ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-600 font-medium">Tanggal Lapor</dt>
                            <dd class="text-gray-900">{{ $arsip->created_at?->format('d F Y H:i') ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-600 font-medium">Kategori Barang</dt>
                            <dd class="text-gray-900">{{ $arsip->kategori->nama_kategori ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-600 font-medium">Lokasi Hilang</dt>
                            <dd class="text-gray-900">{{ $arsip->lokasi_kehilangan ?? 'N/A' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <h4 class="text-base font-semibold text-gray-900 mb-3">Deskripsi Barang</h4>
                <p class="text-gray-700 text-sm leading-relaxed">{{ $arsip->deskripsi_barang ?? 'Tidak ada deskripsi' }}</p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white shadow rounded-lg p-6 flex gap-3">
            <!-- Restore Button -->
            <form action="{{ route('admin.arsip.restore', $arsip->id_laporan) }}" method="POST" class="inline"
                onsubmit="return confirm('Kembalikan laporan ini ke status aktif?');">
                @csrf @method('PUT')
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    Pulihkan ke Aktif
                </button>
            </form>

            <!-- Delete Button -->
            <form action="{{ route('admin.arsip.destroy', $arsip->id_laporan) }}" method="POST" class="inline"
                onsubmit="return confirm('Hapus arsip ini secara permanen? Tindakan ini tidak dapat dibatalkan.');">
                @csrf @method('DELETE')
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    Hapus Permanen
                </button>
            </form>
        </div>
    </div>
@endsection
