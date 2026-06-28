@extends('layouts.warga')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">

        <h4 class="mb-0">

            Riwayat Pembayaran

        </h4>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

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

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->iuran->bulan }}</td>

                    <td>{{ $item->iuran->tahun }}</td>

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

@endsection