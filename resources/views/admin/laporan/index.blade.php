@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h2 class="fw-bold mb-4">
        <i class="bi bi-file-earmark-text-fill text-success"></i>
        Laporan RT Digital
    </h2>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">

                    <i class="bi bi-people-fill text-primary"
                        style="font-size:55px"></i>

                    <h5 class="mt-3">
                        Total Warga
                    </h5>

                    <h2 class="fw-bold text-primary">
                        {{ $totalWarga }}
                    </h2>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">

                    <i class="bi bi-wallet2 text-warning"
                        style="font-size:55px"></i>

                    <h5 class="mt-3">
                        Total Iuran
                    </h5>

                    <h4 class="fw-bold text-warning">
                        Rp {{ number_format($totalIuran,0,',','.') }}
                    </h4>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">

                    <i class="bi bi-cash-stack text-success"
                        style="font-size:55px"></i>

                    <h5 class="mt-3">
                        Total Pemasukan
                    </h5>

                    <h4 class="fw-bold text-success">
                        Rp {{ number_format($totalPemasukan,0,',','.') }}
                    </h4>

                </div>
            </div>
        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                Export Laporan
            </h5>
        </div>

        <div class="card-body">

            <p class="mb-3">
                Klik tombol di bawah ini untuk mengunduh laporan pembayaran dalam format PDF.
            </p>

            <a href="{{ route('pembayaran.pdf') }}"
                class="btn btn-danger">

                <i class="bi bi-file-earmark-pdf-fill"></i>
                Export PDF

            </a>

        </div>

    </div>

</div>

@endsection