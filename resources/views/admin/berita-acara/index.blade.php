@extends('layouts.admin')

@section('title', 'Daftar Berita Acara')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Berita Acara</h1>
        </div>

        @if($beritaAcaras->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. BA</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. Laporan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelapor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dibuat Oleh</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($beritaAcaras as $ba)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $ba->nomor_ba }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $ba->laporan->nomor_laporan }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $ba->laporan->user->nama_lengkap }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $ba->creator->nama_lengkap }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $ba->created_at->locale('id')->translatedFormat('d M Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.berita-acara.show', $ba->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 mr-3">Lihat</a>
                                <a href="{{ route('admin.berita-acara.print', $ba->id) }}" 
                                   class="text-green-600 hover:text-green-900" target="_blank">Print</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $beritaAcaras->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">Belum ada berita acara yang dibuat.</p>
            </div>
        @endif
    </div>
</div>
@endsection