<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Dashboard Admin RT</h2>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <h5>Total Warga</h5>

                    <h3>
                        {{ $totalWarga }}
                    </h3>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <h5>Sudah Bayar</h5>

                    <h3>
                        {{ $totalLunas }}
                    </h3>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <h5>Belum Bayar</h5>

                    <h3>
                        {{ $totalBelumBayar }}
                    </h3>

                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>