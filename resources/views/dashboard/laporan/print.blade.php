<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2,
        .header h3 {
            margin: 5px 0;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="header">
        <h2>POSYANDU MAWAR</h2>
        <h3>{{ $title }}</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                @if($jenis == 'anak')
                    <th>Nama Anak</th>
                    <th>NIK</th>
                    <th>Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Ortu</th>
                @elseif($jenis == 'timbang')
                    <th>Tanggal</th>
                    <th>Nama Anak</th>
                    <th>Berat (kg)</th>
                    <th>Tinggi (cm)</th>
                    <th>Ket.</th>
                @elseif($jenis == 'imunisasi')
                    <th>Tanggal</th>
                    <th>Nama Anak</th>
                    <th>Jenis Imunisasi</th>
                    <th>Petugas</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if($jenis == 'anak')
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->nik }}</td>
                        <td>{{ $d->tgl_lhr->format('d/m/Y') }}</td>
                        <td>{{ $d->jk }}</td>
                        <td>{{ $d->ortu->nama_ibu ?? '-' }}</td>
                    @elseif($jenis == 'timbang')
                        <td>{{ $d->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $d->anak->nama }}</td>
                        <td>{{ $d->berat_badan }}</td>
                        <td>{{ $d->tinggi_badan }}</td>
                        <td>{{ $d->keterangan }}</td>
                    @elseif($jenis == 'imunisasi')
                        <td>{{ $d->tanggal_imunisasi }}</td>
                        <td>{{ $d->anak->nama }}</td>
                        <td>{{ $d->jenis_imunisasi->nama }}</td>
                        <td>{{ $d->user->name ?? 'Petugas' }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>