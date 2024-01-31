<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Anggota {{ \Carbon\Carbon::now()->format('Y-m-d') }}</title>

    <style>
        table {
            width: 100%;
        }

        table, tr, th, td {
            border: 0.5px solid #333333;
        }

        th, td {
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

    </style>
</head>
<body>

    <h2 class="text-center">Laporan Penugasan Petugas</h2>

    <hr>

    <table>
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Pimpinan</th>
                <th>Petugas</th>
                <th>Kecamatan</th>
                <th>Populasi</th>
                <th>KK</th>
                <th>Laki-Laki</th>
                <th>Perempuan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $key => $dt)
                <tr>
                    <td>{{  $key + 1 }}</td>
                    <td>{{  $dt->pimpinan->nama_lengkap ?? '' }}</td>
                    <td>{{  $dt->anggota->nama_lengkap ?? ($dt->anggota->nama ?? '') }}</td>
                    <td>{{  $dt->kecamatan->nama_kecamatan ?? '' }}</td>
                    <td>{{  $dt->jumlah_penduduk ?? '' }}</td>
                    <td>{{  $dt->jumlah_kepala_keluarga ?? '' }}</td>
                    <td>{{  $dt->jumlah_pria ?? '' }}</td>
                    <td>{{  $dt->jumlah_perempuan ?? '' }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</body>
</html>
