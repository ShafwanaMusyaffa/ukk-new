<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Pelelangan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Laporan Pelelangan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Berakhir</th>
                <th>Harga Awal</th>
                <th>Harga Tertinggi</th>
                <th>Pemenang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lelangs as $lelang)
            <tr>
                <td>{{ $lelang->id }}</td>
                <td>{{ $lelang->asset->game }}</td>
                <td>{{ $lelang->created_at->format('d M Y') }}</td>
                <td>{{ $lelang->waktu_berakhir->format('d M Y') }}</td>
                <td>Rp. {{ number_format($lelang->harga_awal, 2, ',', '.') }}</td>
                <td>Rp. {{ number_format($lelang->harga_sekarang, 2, ',', '.') }}</td>
                <td>{{ $lelang->pemenang->nama_lengkap }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
