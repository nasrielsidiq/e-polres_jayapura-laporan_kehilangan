@extends('layouts.admin')

@section('title', 'Buat Berita Acara')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Buat Berita Acara</h1>

        <div class="mb-6 p-4 bg-blue-50 rounded-lg">
            <h3 class="font-semibold text-blue-800">Detail Laporan</h3>
            <p><strong>Nomor:</strong> {{ $laporan->nomor_laporan }}</p>
            <p><strong>Pelapor:</strong> {{ $laporan->user->nama_lengkap }}</p>
            <p><strong>Barang:</strong> {{ $laporan->nama_barang }}</p>
            <p><strong>Status:</strong> 
                <span class="px-2 py-1 text-xs rounded
                    @if($laporan->status === 'done') bg-green-100 text-green-800
                    @elseif($laporan->status === 'found') bg-emerald-100 text-emerald-800
                    @endif">
                    {{ ucfirst($laporan->status) }}
                </span>
            </p>
        </div>

        <form action="{{ route('admin.berita-acara.store', $laporan->id_laporan) }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                    Keterangan Tambahan
                </label>
                <textarea name="keterangan" id="keterangan" rows="4" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan keterangan tambahan untuk berita acara...">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" 
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Buat Berita Acara
                </button>
                <a href="{{ route('admin.laporan.detail', $laporan->id_laporan) }}" 
                   class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection