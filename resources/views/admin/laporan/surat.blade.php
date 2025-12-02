<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Surat Laporan {{ $lap->nomor_laporan }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #111; line-height: 1.4; }
        .header { text-align: center; margin-bottom: 18px; }
        .meta { margin-bottom: 12px; }
        .box { border: 1px solid #333; padding: 12px; margin-bottom: 12px; }
        .right { text-align: right; }
        .small { font-size: 12px; color: #555; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Surat Keterangan Laporan Kehilangan</h2>
        <div class="small">Nomor: {{ $lap->nomor_laporan }}</div>
    </div>

    <div class="meta">
        <strong>Tanggal Lapor:</strong> {{ $lap->tanggal_lapor->format('Y-m-d H:i') }}<br>
        <strong>Status:</strong> {{ ucfirst($lap->status) }}
    </div>

    <div class="box">
        <strong>Nama Barang:</strong>
        <div>{{ $lap->nama_barang }}</div>

        <strong class="mt-2">Deskripsi / Kronologi:</strong>
        <div class="small">{{ $lap->deskripsi_barang ?? $lap->kronologi ?? '-' }}</div>

        <strong class="mt-2">Lokasi Kehilangan:</strong>
        <div>{{ $lap->lokasi_kehilangan }}</div>
    </div>

    <div class="box">
        <div class="right">
            <div>Petugas: {{ $lap->verifikator->nama_lengkap ?? '__________' }}</div>
            <div class="small">Tanggal: {{ optional($lap->verified_at)->format('Y-m-d') ?? date('Y-m-d') }}</div>
        </div>
    </div>
</body>
</html>
