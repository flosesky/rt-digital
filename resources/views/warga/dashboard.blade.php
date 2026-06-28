@extends('layouts.warga')

@section('content')

<div class="container-fluid">

    <h2 class="fw-bold mb-4">

        Dashboard Warga

    </h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card shadow mb-4">

                <div class="card-header bg-primary text-white">

                    Profil Warga

                </div>

                <div class="card-body">

                    @if($warga)

                        <p>

                            <strong>Nama :</strong><br>

                            {{ $warga->nama_kepala_keluarga }}

                        </p>

                        <p>

                            <strong>Alamat :</strong><br>

                            {{ $warga->alamat }}

                        </p>

                        <p>

                            <strong>No Rumah :</strong><br>

                            {{ $warga->nomor_rumah }}

                        </p>

                        <p>

                            <strong>No HP :</strong><br>

                            {{ $warga->nomor_hp }}

                        </p>

                    @else

                        <div class="alert alert-warning">

                            Data warga belum ditemukan.

                        </div>

                    @endif

                </div>

            </div>

        </div>

        <div class="col-md-8">

            <div class="card shadow mb-4">

                <div class="card-header bg-success text-white">

                    Pengumuman Terbaru

                </div>

                <div class="card-body">

                    @forelse($pengumumen as $item)

                        <div class="mb-3">

                            <h5>

                                {{ $item->judul }}

                            </h5>

                            <small class="text-muted">

                                {{ $item->tanggal_publish }}

                            </small>

                            <p class="mt-2">

                                {{ $item->isi }}

                            </p>

                            <hr>

                        </div>

                    @empty

                        <p>

                            Belum ada pengumuman.

                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow">

        <div class="card-header bg-dark text-white">

            Riwayat Pembayaran

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pembayarans as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

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

                            <td colspan="5" class="text-center">

                                Belum ada riwayat pembayaran.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection