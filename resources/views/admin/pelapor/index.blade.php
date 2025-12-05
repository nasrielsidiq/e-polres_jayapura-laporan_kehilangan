@extends('layouts.admin.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold">Daftar Pelapor</h4>
            <a href="{{ route('admin.pelapor.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded-lg">
                Tambah Pelapor
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm border border-gray-200">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 border text-left">Nama</th>
                            <th class="px-4 py-3 border text-left">Email</th>
                            <th class="px-4 py-3 border text-left">Telepon</th>
                            <th class="px-4 py-3 border text-left">Alamat</th>
                            <th class="px-4 py-3 border text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelapor as $p)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border">{{ $p->nama_lengkap }}</td>
                                <td class="px-4 py-3 border">{{ $p->email }}</td>
                                <td class="px-4 py-3 border">{{ $p->no_hp }}</td>
                                <td class="px-4 py-3 border text-xs">{{ $p->full_address ?: '-' }}</td>
                                <td class="px-4 py-3 border space-x-1">
                                    @if (!empty($p->id_user))
                                        <a href="{{ route('admin.pelapor.edit', ['pelapor' => $p->id_user]) }}"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.pelapor.destroy', ['pelapor' => $p->id_user]) }}"
                                            method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus pelapor?')"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs">ID tidak tersedia</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        @if ($pelapor->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">
                                    Belum ada data pelapor
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
