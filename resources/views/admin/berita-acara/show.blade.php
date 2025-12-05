@extends('layouts.admin')

@section('title', 'Detail Berita Acara')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Berita Acara</h1>
            <div class="flex gap-2">
                <a href="{{ route('admin.berita-acara.print', $beritaAcara->id) }}" 
                   class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700" target="_blank">
                    Print PDF
                </a>
                <a href="{{ route('admin.berita-acara.index') }}" 
                   class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                    Kembali
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-4">Informasi Berita Acara</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nomor BA</label>
                        <p class="text-gray-900">{{ $beritaAcara->nomor_ba }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Tanggal Dibuat</label>
                        <p class="text-gray-900">{{ $beritaAcara->created_at->locale('id')->translatedFormat('d M Y H:i') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Dibuat Oleh</label>
                        <p class="text-gray-900">{{ $beritaAcara->creator->nama_lengkap }}</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Informasi Laporan</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Nomor Laporan</label>
                        <p class="text-gray-900">{{ $beritaAcara->laporan->nomor_laporan }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Pelapor</label>
                        <p class="text-gray-900">{{ $beritaAcara->laporan->user->nama_lengkap }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Barang Hilang</label>
                        <p class="text-gray-900">{{ $beritaAcara->laporan->nama_barang }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Status</label>
                        <span class="px-2 py-1 text-xs rounded
                            @if($beritaAcara->laporan->status === 'done') bg-green-100 text-green-800
                            @elseif($beritaAcara->laporan->status === 'found') bg-emerald-100 text-emerald-800
                            @endif">
                            {{ ucfirst($beritaAcara->laporan->status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        @if($beritaAcara->keterangan)
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2">Keterangan</h3>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-gray-700">{{ $beritaAcara->keterangan }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection