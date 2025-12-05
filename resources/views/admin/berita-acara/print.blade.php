<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Berita Acara {{ $beritaAcara->nomor_ba }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .title { font-size: 18px; font-weight: bold; margin-bottom: 20px; }
        .content { line-height: 1.6; }
        .info-table { width: 100%; margin-bottom: 20px; }
        .info-table td { padding: 5px; vertical-align: top; }
        .signature { margin-top: 50px; }
        .signature-box { display: inline-block; width: 200px; text-align: center; margin: 0 50px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>KEPOLISIAN NEGARA REPUBLIK INDONESIA</h2>
        <h3>BERITA ACARA KEHILANGAN</h3>
        <p>Nomor: {{ $beritaAcara->nomor_ba }}</p>
    </div>

    <div class="content">
        <p>Pada hari ini {{ $beritaAcara->created_at->locale('id')->translatedFormat('l') }}, tanggal {{ $beritaAcara->created_at->format('d') }} bulan {{ $beritaAcara->created_at->locale('id')->translatedFormat('F') }} tahun {{ $beritaAcara->created_at->format('Y') }}, telah dibuat berita acara kehilangan dengan data sebagai berikut:</p>

        <table class="info-table">
            <tr>
                <td width="200">Nomor Laporan</td>
                <td width="20">:</td>
                <td>{{ $beritaAcara->laporan->nomor_laporan }}</td>
            </tr>
            <tr>
                <td>Nama Pelapor</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->user->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->user->nik ?? '-' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->user->alamat ?? '-' }}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->user->no_hp }}</td>
            </tr>
            <tr>
                <td>Barang Hilang</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->nama_barang }}</td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->kategori->nama_kategori }}</td>
            </tr>
            <tr>
                <td>Lokasi Kehilangan</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->lokasi_kehilangan }}</td>
            </tr>
            <tr>
                <td>Waktu Kehilangan</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->waktu_kehilangan ? $beritaAcara->laporan->waktu_kehilangan->format('d M Y H:i') : '-' }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{ $beritaAcara->laporan->status === 'done' ? 'Selesai' : 'Ditemukan' }}</td>
            </tr>
        </table>

        @if($beritaAcara->laporan->deskripsi_barang)
        <p><strong>Deskripsi Barang:</strong></p>
        <p>{{ $beritaAcara->laporan->deskripsi_barang }}</p>
        @endif

        @if($beritaAcara->laporan->kronologi)
        <p><strong>Kronologi:</strong></p>
        <p>{{ $beritaAcara->laporan->kronologi }}</p>
        @endif

        @if($beritaAcara->keterangan)
        <p><strong>Keterangan:</strong></p>
        <p>{{ $beritaAcara->keterangan }}</p>
        @endif

        <p>Demikian berita acara ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="signature">
        <table width="100%">
            <tr>
                <td width="50%" style="text-align: center;">
                    <p>Pelapor,</p>
                    <br><br><br>
                    <p><u>{{ $beritaAcara->laporan->user->nama_lengkap }}</u></p>
                </td>
                <td width="50%" style="text-align: center;">
                    <p>{{ $beritaAcara->created_at->locale('id')->translatedFormat('d M Y') }}</p>
                    <p>Petugas,</p>
                    <br><br><br>
                    <p><u>{{ $beritaAcara->creator->nama_lengkap }}</u></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>