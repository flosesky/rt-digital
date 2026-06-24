<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Tambah Warga</h2>

    <form action="{{ route('warga.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kepala Keluarga</label>
            <input type="text" name="nama_kepala_keluarga" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Nomor Rumah</label>
            <input type="text" name="nomor_rumah" class="form-control">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="nomor_hp" class="form-control">
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

</body>
</html>