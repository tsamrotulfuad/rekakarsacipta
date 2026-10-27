<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/Logo-RKC-Emas.webp') }}">
    <title>Lembar Profil Inovasi - {{ $inovasi->nama_inovasi }}</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.5;
            margin: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .header p {
            margin: 4px 0 0;
            font-size: 12px;
            color: #666;
        }

        .table-detail {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table-detail th,
        .table-detail td {
            padding: 9px 12px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .table-detail th {
            background-color: #f7f7f7;
            text-align: left;
            width: 30%;
            font-weight: bold;
        }

        .signature-section {
            margin-top: 40px;
            float: right;
            text-align: center;
            width: 200px;
        }

        .signature-space {
            height: 60px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Profil Inovasi Masyarakat</h2>
        <p>Dokumen Cetak Resmi Data Inovasi</p>
    </div>

    <table class="table-detail">
        <tr>
            <th>Nama Inovasi</th>
            <td>{{ $inovasi->nama_inovasi }}</td>
        </tr>
        <tr>
            <th>Inisiator</th>
            <td>{{ $inovasi->nama_inisiator }}</td>
        </tr>
        <tr>
            <th>Bentuk Inovasi</th>
            <td>{{ $inovasi->bentuk }}</td>
        </tr>
        <tr>
            <th>Tahapan Inovasi</th>
            <td>{{ $inovasi->tahapan }}</td>
        </tr>
        <tr>
            <th>Jenis Inovasi</th>
            <td>{{ $inovasi->jenis }}</td>
        </tr>
        <tr>
            <th>Waktu Penerapan</th>
            <td>{{ $inovasi->waktu_penerapan }}</td>
        </tr>
        <tr>
            <th>Akun Penginput</th>
            <td>{{ $inovasi->user->name ?? '-' }} (email: {{ $inovasi->user->email }})</td>
        </tr>
        <tr>
            <th>Tanggal Dibuat</th>
            <td>{{ $inovasi->created_at ? $inovasi->created_at->translatedFormat('d F Y H:i') : '-' }}</td>
        </tr>
        <tr>
            <th>Rancang bangun</th>
            <td>{!! $inovasi->rancang_bangun !!}</td>
        </tr>
        <tr>
            <th>Tujuan Inovasi</th>
            <td>{!! $inovasi->tujuan !!}</td>
        </tr>
        <tr>
            <th>Manfaat Inovasi</th>
            <td>{!! $inovasi->manfaat !!}</td>
        </tr>
        <tr>
            <th>Hasil Inovasi</th>
            <td>{!! $inovasi->hasil !!}</td>
        </tr>
        <tr>
            <th>Video Inovasi</th>
            <td>{!! $inovasi->kualitas_video !!}</td>
        </tr>
    </table>

    <div class="signature-section">
        <p>Dicetak pada: {{ date('d/m/Y') }}<br>Penanggung Jawab,</p>
        <div class="signature-space"></div>
        <p><strong>( ..................................... )</strong></p>
    </div>

</body>

</html>
