@extends('layouts.admin.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold">Daftar Petugas</h4>
            <a href="{{ route('admin.petugas.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-lg">Tambah Petugas</a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border border-gray-200">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 border text-left">Nama</th>
                            <th class="px-4 py-3 border text-left">Email</th>
                            <th class="px-4 py-3 border text-left">Role</th>
                            <th class="px-4 py-3 border text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $p)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border">{{ $p->nama_lengkap }}</td>
                                <td class="px-4 py-3 border">{{ $p->email }}</td>
                                <td class="px-4 py-3 border">{{ $p->roles->pluck('name')->implode(', ') }}</td>
                                <td class="px-4 py-3 border space-x-1">
                                    <a href="{{ route('admin.petugas.edit', $p->id_user) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">Edit</a>
                                    <form action="{{ route('admin.petugas.destroy', $p->id_user) }}" method="POST"
                                        class="inline">
                                        @csrf @method('DELETE')
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs"
                                            onclick="return confirm('Hapus petugas?')">Hapus</button>
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
