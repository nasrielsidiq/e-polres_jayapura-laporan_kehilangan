@extends('layouts.admin.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="p-4 bg-white shadow rounded">
        <h3 class="font-semibold text-gray-700">Total Laporan</h3>
        <p class="text-2xl font-bold mt-2">{{ $total_laporan ?? 0 }}</p>
    </div>

    <div class="p-4 bg-white shadow rounded">
        <h3 class="font-semibold text-gray-700">Laporan Pending</h3>
        <p class="text-2xl font-bold mt-2">{{ $laporan_pending ?? 0 }}</p>
    </div>

    <div class="p-4 bg-white shadow rounded">
        <h3 class="font-semibold text-gray-700">Laporan Selesai</h3>
        <p class="text-2xl font-bold mt-2">{{ $laporan_selesai ?? 0 }}</p>
    </div>

</div>

@endsection
