@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="card border-0 shadow mb-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="fw-bold mb-1">

                        👋 Selamat Datang, Admin RT

                    </h2>

                    <p class="text-muted mb-0">

                        Kelola seluruh data RT Digital melalui dashboard ini.

                    </p>

                </div>

                <div class="text-end">

                    <h5 class="mb-1">

                        {{ now()->translatedFormat('l') }}

                    </h5>

                    <span class="text-muted">

                        {{ now()->translatedFormat('d F Y') }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- Statistik -->

    <div class="row">

        <!-- Total Warga -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Total Warga

                            </h6>

                            <h2 class="fw-bold text-primary">

                                {{ $totalWarga }}

                            </h2>

                        </div>

                        <i class="bi bi-people-fill text-primary"
                           style="font-size:45px;"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- Sudah Bayar -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Sudah Bayar

                            </h6>

                            <h2 class="fw-bold text-success">

                                {{ $totalLunas }}

                            </h2>

                        </div>

                        <i class="bi bi-cash-coin text-success"
                           style="font-size:45px;"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- Belum Bayar -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Belum Bayar

                            </h6>

                            <h2 class="fw-bold text-danger">

                                {{ $totalBelumBayar }}

                            </h2>

                        </div>

                        <i class="bi bi-exclamation-circle-fill text-danger"
                           style="font-size:45px;"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- Pengumuman -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Pengumuman

                            </h6>

                            <h2 class="fw-bold text-warning">

                                {{ $totalPengumuman }}

                            </h2>

                        </div>

                        <i class="bi bi-megaphone-fill text-warning"
                           style="font-size:45px;"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- Total Iuran -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Total Iuran

                            </h6>

                            <h4 class="fw-bold text-info">

                                Rp {{ number_format($totalIuran,0,',','.') }}

                            </h4>

                        </div>

                        <i class="bi bi-wallet2 text-info"
                           style="font-size:45px;"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- Total Pemasukan -->

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-muted">

                                Total Pemasukan

                            </h6>

                            <h4 class="fw-bold text-success">

                                Rp {{ number_format($totalPemasukan,0,',','.') }}

                            </h4>

                        </div>

                        <i class="bi bi-graph-up-arrow text-success"
                           style="font-size:45px;"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Grafik -->

    <div class="card shadow border-0">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            <i class="bi bi-bar-chart-fill text-success"></i>

            Grafik Pembayaran

        </h5>

    </div>

    <div class="card-body">

        <canvas id="paymentChart" height="100"></canvas>

    </div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('paymentChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: @json($labels ?? []),

        datasets: [{

            label: 'Jumlah Pembayaran',

            data: @json($data ?? []),

            backgroundColor: [

                '#198754'

            ],

            borderRadius: 8,

            borderSkipped: false

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: false

            }

        },

        scales: {

            y: {

                beginAtZero: true,

                ticks: {

                    precision: 0

                }

            }

        }

    }

});

</script>

@endsection