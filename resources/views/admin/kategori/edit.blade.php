@extends('layouts.admin.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="max-w-2xl mx-auto px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Kategori Barang</h1>
        <p class="text-gray-600 text-sm mt-1">Perbarui informasi kategori barang</p>
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
        <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}" method="POST">
            @csrf @method('PUT')

            @include('admin.kategori.form')

            <div class="flex gap-3 pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition">
                    Perbarui Kategori
                </button>
                <a href="{{ route('admin.kategori.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg font-medium transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
