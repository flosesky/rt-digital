@extends('layouts.warga')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 mb-4">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h2 class="fw-bold">

                        👋 Selamat Datang,

                        {{ $user->name }}

                    </h2>

                    <p class="text-muted">

                        Selamat datang di Sistem Informasi RT Digital.
                        Gunakan menu di samping untuk melihat status iuran,
                        pengumuman terbaru dan melakukan pembayaran.

                    </p>

                </div>

                <div class="col-md-4 text-end">

                    <span class="badge bg-success fs-6">

                        {{ now()->translatedFormat('d F Y') }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card shadow h-100">

                <div class="card-body text-center">

                    <i class="bi bi-wallet2 text-success"
                        style="font-size:55px;"></i>

                    <h5 class="mt-3">

                        Status Iuran

                    </h5>

                    @if($statusIuran=="lunas")

                        <span class="badge bg-success fs-6">

                            Lunas

                        </span>

                    @else

                        <span class="badge bg-danger fs-6">

                            Belum Bayar

                        </span>

                    @endif

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card shadow h-100">

                <div class="card-body text-center">

                    <i class="bi bi-megaphone-fill text-warning"
                        style="font-size:55px;"></i>

                    <h5 class="mt-3">

                        Pengumuman

                    </h5>

                    <h3 class="fw-bold text-warning">

                        {{ $jumlahPengumuman }}

                    </h3>

                    <small class="text-muted">

                        Total Pengumuman

                    </small>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card shadow h-100">

                <div class="card-body text-center">

                    <i class="bi bi-qr-code-scan text-primary"
                        style="font-size:55px;"></i>

                    <h5 class="mt-3">

                        Bayar Iuran

                    </h5>

                    <a
                        href="{{ route('warga.qris') }}"
                        class="btn btn-success">

                        Bayar Sekarang

                    </a>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card shadow h-100">

                <div class="card-body text-center">

                    <i class="bi bi-clock-history text-danger"
                        style="font-size:55px;"></i>

                    <h5 class="mt-3">

                        Riwayat

                    </h5>

                    <h3 class="fw-bold text-danger">

                        {{ $jumlahPembayaran }}

                    </h3>

                    <small class="text-muted">

                        Total Pembayaran

                    </small>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-7">

            <div class="card shadow mb-4">

                <div class="card-header bg-success text-white">

                    <i class="bi bi-megaphone-fill"></i>

                    Pengumuman Terbaru

                </div>

                <div class="card-body">

                    <ul class="list-group list-group-flush">

                        @forelse($pengumumen as $item)

                        <li class="list-group-item">

                            <strong>

                                {{ $item->judul }}

                            </strong>

                            <br>

                            <small class="text-muted">

                                {{ $item->created_at->format('d M Y') }}

                            </small>

                            <p class="mt-2 mb-0">

                                {{ $item->isi }}

                            </p>

                        </li>

                        @empty

                        <li class="list-group-item text-center">

                            Belum ada pengumuman.

                        </li>

                        @endforelse

                    </ul>

                </div>

            </div>

        </div>

       <div class="col-lg-5">

    <div class="card shadow mb-4">

        <div class="card-header bg-primary text-white">

            <i class="bi bi-clock-history"></i>

            Riwayat Pembayaran

        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>Bulan</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pembayarans->take(5) as $item)

                    <tr>

                        <td>

                            {{ $item->iuran->bulan }}

                            {{ $item->iuran->tahun }}

                        </td>

                        <td>

                            @if($item->status == 'lunas')

                                <span class="badge bg-success">

                                    Lunas

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Belum Bayar

                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="2" class="text-center text-muted">

                            Belum ada riwayat pembayaran.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

            <div class="text-center mt-3">

                <a
                    href="{{ route('warga.riwayat') }}"
                    class="btn btn-outline-primary">

                    Lihat Semua Riwayat

                </a>

            </div>

        </div>

    </div>

</div>

</div>

</div>

@endsection