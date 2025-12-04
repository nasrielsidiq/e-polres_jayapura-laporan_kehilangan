@extends('layouts.admin.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Arsip Laporan</h1>
                <p class="text-gray-600 text-sm mt-1">Daftar laporan yang telah selesai atau ditutup</p>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="bg-white shadow rounded-lg p-4 mb-6">
            <form action="{{ route('admin.arsip.index') }}" method="GET" class="flex gap-3" id="searchForm">
                <input type="text" name="search" placeholder="Cari nomor laporan atau pelapor..."
                    value="{{ request('search') }}" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    onkeypress="if(event.key==='Enter') document.getElementById('searchForm').submit()">
                <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    onchange="document.getElementById('searchForm').submit()">
                    <option value="">Semua Status</option>
                    <option value="done" {{ request('status') === 'done' ? 'selected' : '' }}>Selesai</option>
                    <option value="found" {{ request('status') === 'found' ? 'selected' : '' }}>Ditemukan</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    Cari
                </button>
                <a href="{{ route('admin.arsip.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium">
                    Atur Ulang
                </a>
            </form>
        </div>

        <!-- Messages -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                <h3 class="text-red-800 font-semibold text-sm mb-2">Terjadi Kesalahan</h3>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                <p class="text-green-800 text-sm">✓ {{ session('success') }}</p>
            </div>
        @endif

        <!-- Archive Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border border-gray-200">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-4 py-3 border text-left">Nomor Laporan</th>
                            <th class="px-4 py-3 border text-left">Pelapor</th>
                            <th class="px-4 py-3 border text-left">Barang Hilang</th>
                            <th class="px-4 py-3 border text-left">Status</th>
                            <th class="px-4 py-3 border text-left">Tanggal Lapor</th>
                            <th class="px-4 py-3 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($arsip as $laporan)
                            <tr class="hover:bg-gray-50 border-t">
                                <td class="px-4 py-3 border font-mono text-blue-600">
                                    {{ $laporan->nomor_laporan ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 border">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $laporan->user->nama_lengkap ?? 'N/A' }}</p>
                                        <p class="text-gray-500 text-xs">{{ $laporan->user->email ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 border">
                                    <div>
                                        <p class="text-gray-900">{{ $laporan->kategori->nama_kategori ?? 'N/A' }}</p>
                                        <p class="text-gray-500 text-xs truncate">{{ $laporan->deskripsi_barang ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 border">
                                    @php
                                        $statusClasses = [
                                            'done' => 'bg-green-100 text-green-800',
                                            'found' => 'bg-blue-100 text-blue-800',
                                            'rejected' => 'bg-red-100 text-red-800',
                                        ];
                                        $class = $statusClasses[$laporan->status] ?? 'bg-gray-100 text-gray-800';
                                        $statusLabels = [
                                            'done' => 'Selesai',
                                            'found' => 'Ditemukan', 
                                            'rejected' => 'Ditolak'
                                        ];
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $class }}">
                                        {{ $statusLabels[$laporan->status] ?? ucfirst($laporan->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border text-gray-600 text-xs">
                                    {{ $laporan->created_at?->format('d M Y H:i') ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 border text-center">
                                    <div class="flex gap-2 justify-center">
                                        <!-- View Detail -->
                                        <a href="{{ route('admin.arsip.show', $laporan->id_laporan) }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs font-medium transition"
                                            title="Lihat Detail">
                                            Lihat
                                        </a>

                                        <!-- Restore -->
                                        <form action="{{ route('admin.arsip.restore', $laporan->id_laporan) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Kembalikan laporan ini ke status aktif?');">
                                            @csrf @method('PUT')
                                            <button type="submit"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-medium transition"
                                                title="Pulihkan ke Aktif">
                                                Pulihkan
                                            </button>
                                        </form>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.arsip.destroy', $laporan->id_laporan) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Hapus arsip ini secara permanen? Tindakan ini tidak dapat dibatalkan.');">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-medium transition"
                                                title="Hapus Permanen">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-8">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p class="font-medium">Tidak ada data arsip</p>
                                        <p class="text-sm">Laporan yang selesai akan muncul di sini</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $arsip->appends(request()->query())->links() }}
        </div>

        <!-- Summary Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <p class="text-green-600 text-xs font-semibold uppercase">Total Selesai</p>
                <p class="text-2xl font-bold text-green-700 mt-1">
                    {{ \App\Models\LaporanKehilangan::where('status', 'done')->count() }}
                </p>
            </div>
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <p class="text-blue-600 text-xs font-semibold uppercase">Total Ditemukan</p>
                <p class="text-2xl font-bold text-blue-700 mt-1">
                    {{ \App\Models\LaporanKehilangan::where('status', 'found')->count() }}
                </p>
            </div>
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <p class="text-red-600 text-xs font-semibold uppercase">Total Ditolak</p>
                <p class="text-2xl font-bold text-red-700 mt-1">
                    {{ \App\Models\LaporanKehilangan::where('status', 'rejected')->count() }}
                </p>
            </div>
        </div>
    </div>
@endsection
