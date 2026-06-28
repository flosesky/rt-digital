@extends('layouts.warga')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">

                Pembayaran Iuran RT Digital

            </h4>

        </div>

        <div class="card-body text-center">

            <h5>

                Nominal Iuran

            </h5>

            <h2 class="text-success">

                Rp50.000

            </h2>

            <hr>

            <img
                src="{{ asset('qris/qris-rt.png') }}"
                width="300"
                class="img-fluid">

            <hr>

            <p class="text-muted">

                Scan QRIS menggunakan aplikasi
                Mobile Banking, DANA, OVO, GoPay,
                ShopeePay atau aplikasi pembayaran lainnya.

            </p>

            <a
                href="{{ route('warga.dashboard') }}"
                class="btn btn-success">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection