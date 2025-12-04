<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Surat Keterangan Kehilangan {{ $lap->nomor_laporan }}</title>
    <style>
        body { font-family: 'Times New Roman', serif; color: #000; line-height: 1.6; margin: 20px; }
        .kop { text-align: center; border-bottom: 3px solid #000; padding-bottom: 15px; margin-bottom: 20px; }
        .kop h1 { font-size: 18px; font-weight: bold; margin: 5px 0; }
        .kop h2 { font-size: 16px; font-weight: bold; margin: 5px 0; }
        .kop p { font-size: 12px; margin: 2px 0; }
        .nomor { text-align: center; margin: 20px 0; font-weight: bold; }
        .content { margin: 20px 0; text-align: justify; }
        .data-table { width: 100%; margin: 15px 0; }
        .data-table td { padding: 5px; vertical-align: top; }
        .ttd { margin-top: 40px; }
        .ttd-left { float: left; width: 45%; }
        .ttd-right { float: right; width: 45%; text-align: center; }
        .ttd-space { height: 80px; }
        .clear { clear: both; }
    </style>
</head>
<body>
    <div class="kop">
        <h1>KEPOLISIAN NEGARA REPUBLIK INDONESIA</h1>
        <h2>KEPOLISIAN RESOR KOTA</h2>
        <p>Jl. Raya Polres No. 123, Kota, Provinsi 12345</p>
        <p>Telp: (021) 1234567 | Email: polres@polri.go.id</p>
    </div>

    <div class="nomor">
        <u>SURAT KETERANGAN KEHILANGAN</u><br>
        Nomor: {{ $lap->nomor_laporan }}
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini, Pejabat Kepolisian Negara Republik Indonesia pada Kepolisian Resor Kota, dengan ini menerangkan bahwa:</p>
        
        <table class="data-table">
            <tr>
                <td width="150">Nama</td>
                <td width="10">:</td>
                <td>{{ $lap->user->nama_lengkap ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $lap->user->nik ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $lap->user->alamat ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td>{{ $lap->user->no_hp ?? 'N/A' }}</td>
            </tr>
        </table>

        <p>Telah melaporkan kehilangan barang dengan keterangan sebagai berikut:</p>

        <table class="data-table">
            <tr>
                <td width="150">Nama Barang</td>
                <td width="10">:</td>
                <td><strong>{{ $lap->nama_barang }}</strong></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>{{ $lap->kategori->nama_kategori ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Lokasi Kehilangan</td>
                <td>:</td>
                <td>{{ $lap->lokasi_kehilangan }}</td>
            </tr>
            <tr>
                <td>Waktu Kehilangan</td>
                <td>:</td>
                <td>{{ $lap->waktu_kehilangan ? $lap->waktu_kehilangan->format('d F Y, H:i') : 'Tidak diketahui' }} WIB</td>
            </tr>
            <tr>
                <td>Tanggal Lapor</td>
                <td>:</td>
                <td>{{ $lap->tanggal_lapor->format('d F Y') }}</td>
            </tr>
        </table>

        <p><strong>Deskripsi Barang:</strong><br>
        {{ $lap->deskripsi_barang ?? 'Tidak ada deskripsi' }}</p>

        @if($lap->kronologi)
        <p><strong>Kronologi Kejadian:</strong><br>
        {{ $lap->kronologi }}</p>
        @endif

        <p>Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="ttd">
        <div class="ttd-left">
            <p>Pelapor,</p>
            <div class="ttd-space"></div>
            <p><u>{{ $lap->user->nama_lengkap ?? 'N/A' }}</u></p>
        </div>
        
        <div class="ttd-right">
            <p>Kota, {{ now()->format('d F Y') }}</p>
            <p>An. Kapolres Kota<br>Kepala Unit Pelayanan</p>
            <div class="ttd-space"></div>
            <p><u>{{ $lap->verifikator->nama_lengkap ?? 'NAMA PETUGAS' }}</u><br>
            {{ $lap->verifikator ? 'NRP. 1234567890' : 'NRP. __________' }}</p>
        </div>
        
        <div class="clear"></div>
    </div>
</body>
</html>
