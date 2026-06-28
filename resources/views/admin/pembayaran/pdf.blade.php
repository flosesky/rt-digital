<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Laporan Pembayaran</title>

    <style>

        body{

            font-family: DejaVu Sans, sans-serif;

            font-size:12px;

        }

        h2{

            text-align:center;

            margin-bottom:5px;

        }

        p{

            text-align:center;

            margin-top:0;

        }

        table{

            width:100%;

            border-collapse:collapse;

            margin-top:20px;

        }

        table th{

            background:#198754;

            color:white;

            border:1px solid #000;

            padding:8px;

        }

        table td{

            border:1px solid #000;

            padding:6px;

            text-align:center;

        }

        .footer{

            margin-top:30px;

            text-align:right;

        }

    </style>

</head>

<body>

<h2>

    LAPORAN PEMBAYARAN RT DIGITAL

</h2>

<p>

    Dicetak :

    {{ date('d-m-Y H:i') }}

</p>

<table>

    <thead>

        <tr>

            <th>No</th>
            <th>Nama Warga</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Nominal</th>
            <th>Tanggal Bayar</th>
            <th>Status</th>

        </tr>

    </thead>

    <tbody>

    @foreach($pembayarans as $item)

        <tr>

            <td>

                {{ $loop->iteration }}

            </td>

            <td>

                {{ $item->warga->nama_kepala_keluarga }}

            </td>

            <td>

                {{ $item->iuran->bulan }}

            </td>

            <td>

                {{ $item->iuran->tahun }}

            </td>

            <td>

                Rp {{ number_format($item->iuran->nominal,0,',','.') }}

            </td>

            <td>

                {{ $item->tanggal_bayar }}

            </td>

            <td>

                {{ ucfirst(str_replace('_',' ',$item->status)) }}

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

<div class="footer">

    RT Digital

</div>

</body>

</html>