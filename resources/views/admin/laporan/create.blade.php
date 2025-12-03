@extends('layouts.admin.app')

@section('title', 'Buat Laporan')

@section('content')
<div class="max-w-4xl mx-auto px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Buat Laporan Kehilangan</h1>
        <p class="text-gray-600 text-sm mt-1">Buat laporan kehilangan barang baru</p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
            <h3 class="text-red-800 font-semibold text-sm mb-2">Terjadi Kesalahan</h3>
            <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.laporan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lapor</label>
                    <input type="date" name="tanggal_lapor" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('tanggal_lapor') border-red-500 @enderror" 
                           value="{{ old('tanggal_lapor', date('Y-m-d')) }}" required>
                    @error('tanggal_lapor')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Barang</label>
                    <select name="id_kategori_barang" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('id_kategori_barang') border-red-500 @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id_kategori }}" {{ old('id_kategori_barang') == $k->id_kategori ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('id_kategori_barang')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nama_barang') border-red-500 @enderror" 
                           value="{{ old('nama_barang') }}" required>
                    @error('nama_barang')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kehilangan</label>
                    <input type="text" name="lokasi_kehilangan" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('lokasi_kehilangan') border-red-500 @enderror" 
                           value="{{ old('lokasi_kehilangan') }}" required>
                    @error('lokasi_kehilangan')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Kehilangan (Opsional)</label>
                    <input type="time" name="waktu_kehilangan" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('waktu_kehilangan') border-red-500 @enderror" 
                           value="{{ old('waktu_kehilangan') }}">
                    @error('waktu_kehilangan')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Barang</label>
                <textarea name="deskripsi_barang" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('deskripsi_barang') border-red-500 @enderror" 
                          required>{{ old('deskripsi_barang') }}</textarea>
                @error('deskripsi_barang')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kronologi Kejadian (Opsional)</label>
                <textarea name="kronologi" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('kronologi') border-red-500 @enderror">{{ old('kronologi') }}</textarea>
                @error('kronologi')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Lampiran (Foto/PDF)</label>
                <input type="file" name="lampiran[]" multiple accept="image/*,application/pdf"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-gray-500 text-xs mt-1">Pilih beberapa file jika diperlukan (JPG, PNG, PDF)</p>
                @error('lampiran.*')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition">
                    Simpan Laporan
                </button>
                <a href="{{ route('admin.laporan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-medium transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
