@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="p-4 mb-4 bg-success text-white rounded shadow">

        <h2 class="fw-bold">

            👋 Selamat Datang, {{ Auth::user()->name }}

        </h2>

        <p class="mb-0">

            Kelola seluruh data RT Digital dengan mudah.

        </p>

    </div>

    <div class="row">

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">

                                Total Warga

                            </h6>

                            <h2 class="fw-bold text-primary">

                                {{ $totalWarga }}

                            </h2>

                        </div>

                        <div class="fs-1">

                            👨

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">

                                Total Iuran

                            </h6>

                            <h5 class="fw-bold text-warning">

                                Rp {{ number_format($totalIuran,0,',','.') }}

                            </h5>

                        </div>

                        <div class="fs-1">

                            💰

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">

                                Sudah Bayar

                            </h6>

                            <h2 class="fw-bold text-success">

                                {{ $totalLunas }}

                            </h2>

                        </div>

                        <div class="fs-1">

                            ✅

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card border-0 shadow h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="text-muted">

                                Belum Bayar

                            </h6>

                            <h2 class="fw-bold text-danger">

                                {{ $totalBelumBayar }}

                            </h2>

                        </div>

                        <div class="fs-1">

                            ❌

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-8 mb-4">

            <div class="card border-0 shadow">

                <div class="card-header bg-white">

                    <h5 class="mb-0">

                        Grafik Pembayaran

                    </h5>

                </div>

                <div class="card-body">

                    <canvas id="paymentChart" height="120"></canvas>

                </div>

            </div>

        </div>

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow">

                <div class="card-header bg-white">

                    <h5 class="mb-0">

                        Ringkasan

                    </h5>

                </div>

                <div class="card-body">

                    <p>

                        📢 Total Pengumuman

                        <span class="float-end">

                            <strong>{{ $totalPengumuman }}</strong>

                        </span>

                    </p>

                    <hr>

                    <p>

                        💵 Total Pemasukan

                        <span class="float-end text-success">

                            <strong>

                                Rp {{ number_format($totalPemasukan,0,',','.') }}

                            </strong>

                        </span>

                    </p>

                    <hr>

                    <p class="mb-0">

                        👨 Total Kepala Keluarga

                        <span class="float-end">

                            <strong>{{ $totalWarga }}</strong>

                        </span>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('paymentChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: @json($labels),

        datasets: [{

            label: 'Pembayaran',

            data: @json($data),

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

@endsection