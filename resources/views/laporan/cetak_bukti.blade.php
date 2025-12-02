<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukti Laporan {{ $lap->nomor_laporan }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.6; margin: 20px; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 5px 0; font-size: 14px; }
        .section { margin-bottom: 25px; }
        .section h3 { background: #f5f5f5; padding: 10px; margin: 0 0 15px 0; font-size: 16px; }
        .info-grid { display: table; width: 100%; }
        .info-row { display: table-row; }
        .info-label { display: table-cell; width: 30%; padding: 8px 0; font-weight: bold; }
        .info-value { display: table-cell; padding: 8px 0; }
        .status { padding: 8px 15px; border-radius: 5px; display: inline-block; font-weight: bold; }
        .status.pending { background: #fff3cd; color: #856404; }
        .status.verified { background: #d1ecf1; color: #0c5460; }
        .status.selesai { background: #d4edda; color: #155724; }
        .footer { margin-top: 40px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h1>BUKTI LAPORAN KEHILANGAN</h1>
        <p><strong>Nomor Laporan:</strong> {{ $lap->nomor_laporan }}</p>
        <p>Tanggal Cetak: {{ now()->format('d F Y H:i') }} WIB</p>
    </div>

    <div class="section">
        <h3>Status Laporan</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Status:</div>
                <div class="info-value">
                    <span class="status {{ $lap->status }}">
                        @if($lap->status === 'pending') Menunggu Verifikasi
                        @elseif($lap->status === 'verified') Terverifikasi
                        @elseif($lap->status === 'selesai') Selesai
                        @else {{ ucfirst($lap->status) }}
                        @endif
                    </span>
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Lapor:</div>
                <div class="info-value">{{ $lap->tanggal_lapor }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <h3>Informasi Barang</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Nama Barang:</div>
                <div class="info-value">{{ $lap->nama_barang }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kategori:</div>
                <div class="info-value">{{ $lap->kategori?->nama_kategori ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Lokasi Hilang:</div>
                <div class="info-value">{{ $lap->lokasi_kehilangan }}</div>
            </div>
            @if($lap->waktu_kehilangan)
            <div class="info-row">
                <div class="info-label">Waktu Hilang:</div>
                <div class="info-value">{{ $lap->waktu_kehilangan }}</div>
            </div>
            @endif
        </div>
        @if($lap->deskripsi_barang)
        <div style="margin-top: 15px;">
            <strong>Deskripsi:</strong><br>
            {{ $lap->deskripsi_barang }}
        </div>
        @endif
    </div>

    <div class="section">
        <h3>Informasi Pelapor</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Nama:</div>
                <div class="info-value">{{ $lap->user->nama_lengkap }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $lap->user->email }}</div>
            </div>
            @if($lap->user->no_hp)
            <div class="info-row">
                <div class="info-label">Telepon:</div>
                <div class="info-value">{{ $lap->user->no_hp }}</div>
            </div>
            @endif
        </div>
    </div>

    @if($lap->verified_at || $lap->selesai_at)
    <div class="section">
        <h3>Informasi Verifikasi</h3>
        <div class="info-grid">
            @if($lap->verified_at)
            <div class="info-row">
                <div class="info-label">Diverifikasi:</div>
                <div class="info-value">{{ $lap->verified_at->format('d F Y H:i') }} WIB</div>
            </div>
            <div class="info-row">
                <div class="info-label">Petugas:</div>
                <div class="info-value">{{ $lap->verifikator?->nama_lengkap ?? 'Petugas' }}</div>
            </div>
            @endif
            @if($lap->selesai_at)
            <div class="info-row">
                <div class="info-label">Diselesaikan:</div>
                <div class="info-value">{{ $lap->selesai_at->format('d F Y H:i') }} WIB</div>
            </div>
            @endif
        </div>
    </div>
    @endif

    <div class="footer">
        <p><strong>Sistem Pelaporan Kehilangan - {{ config('app.name') }}</strong></p>
        <p>Dokumen ini dicetak secara otomatis dan sah tanpa tanda tangan</p>
        <p>Untuk verifikasi, kunjungi website resmi atau hubungi petugas</p>
    </div>
</body>
</html>