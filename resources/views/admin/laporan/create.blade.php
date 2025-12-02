@extends('layouts.admin.app')

@section('title', 'Buat Laporan (Admin)')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-lg font-semibold mb-4">Buat Laporan Kehilangan</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-50 border border-red-200 p-3 rounded text-sm text-red-700">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.laporan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Laporan</label>
                <input type="text" name="nomor_laporan" value="{{ old('nomor_laporan') }}" class="mt-1 block w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="id_kategori_barang" class="mt-1 block w-full border rounded px-3 py-2" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id_kategori }}" {{ old('id_kategori_barang') == $k->id_kategori ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="mt-1 block w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Lokasi Kehilangan</label>
                <input type="text" name="lokasi_kehilangan" value="{{ old('lokasi_kehilangan') }}" class="mt-1 block w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Waktu Kehilangan</label>
                <input type="datetime-local" name="waktu_kehilangan" value="{{ old('waktu_kehilangan') }}" class="mt-1 block w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi Barang</label>
                <textarea name="deskripsi_barang" rows="4" class="mt-1 block w-full border rounded px-3 py-2">{{ old('deskripsi_barang') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kronologi</label>
                <textarea name="kronologi" rows="4" class="mt-1 block w-full border rounded px-3 py-2">{{ old('kronologi') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Lampiran (foto/pdf) — boleh pilih banyak</label>
                <input type="file" name="lampiran[]" multiple class="mt-1 block w-full">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.laporan.index') }}" class="mr-2 px-4 py-2 bg-gray-100 rounded">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
