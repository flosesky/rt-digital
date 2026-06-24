<!DOCTYPE html>
<html>
<head>
    <title>Data Warga</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Warga</h2>

<a href="{{ route('warga.create') }}" class="btn btn-primary mb-3">
        Tambah Warga
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>Kepala Keluarga</th>
                <th>Alamat</th>
                <th>No Rumah</th>
                <th>No HP</th>
            </tr>
        </thead>

        <tbody>

        @forelse($wargas as $warga)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $warga->nama_kepala_keluarga }}</td>
                <td>{{ $warga->alamat }}</td>
                <td>{{ $warga->nomor_rumah }}</td>
                <td>{{ $warga->nomor_hp }}</td>
            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center">
                    Belum ada data warga
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>