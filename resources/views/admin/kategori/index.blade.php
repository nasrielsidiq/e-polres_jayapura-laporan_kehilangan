@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="flex items-center justify-between mb-4">
        <h4 class="text-lg font-semibold">Kategori Barang</h4>
        <a href="{{ route('admin.kategori.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-lg">Tambah Kategori</a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-3 border text-left">Nama</th>
                        <th class="px-4 py-3 border text-left">Deskripsi</th>
                        <th class="px-4 py-3 border text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border">{{ $k->nama_kategori }}</td>
                        <td class="px-4 py-3 border">{{ $k->deskripsi }}</td>
                        <td class="px-4 py-3 border space-x-1">
                            <a href="{{ route('admin.kategori.edit', $k->id_kategori) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">Edit</a>
                            <form action="{{ route('admin.kategori.destroy', $k->id_kategori) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs" onclick="return confirm('Hapus kategori?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
