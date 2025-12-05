@extends('layouts.admin.app')

@section('title', 'Manajemen Laporan')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold text-gray-800">Kelola Laporan</h1>
        <a href="{{ route('admin.laporan.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700">
            Buat Laporan
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="p-4">
            <table id="laporan-table" class="min-w-full table-auto">
                <thead>
                    <tr class="text-left text-xs text-gray-500 uppercase">
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nomor</th>
                        <th class="px-4 py-2">Nama Barang</th>
                        <th class="px-4 py-2">Tanggal Lapor</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('#laporan-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("admin.laporan.index") !!}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nomor_laporan', name: 'nomor_laporan' },
            { data: 'nama_barang', name: 'nama_barang' },
            { data: 'tanggal_lapor', name: 'tanggal_lapor' },
            { data: 'status', name: 'status' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
        ],
        order: [[3, 'desc']],
        pageLength: 10,
        language: {
            "processing": "Memproses...",
            "lengthMenu": "Tampilkan _MENU_ entri",
            "zeroRecords": "Tidak ada data yang ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "infoFiltered": "(disaring dari _MAX_ total entri)",
            "search": "Cari:",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });
});
</script>
@endpush
