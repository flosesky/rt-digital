@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <h3 class="fw-bold">

        Data Pembayaran

    </h3>

    <div>

    <a
        href="{{ route('pembayaran.pdf') }}"
        class="btn btn-danger">

        Export PDF

    </a>

    <a
        href="{{ route('pembayaran.excel') }}"
        class="btn btn-success">

        Export Excel

    </a>

    <a
        href="{{ route('pembayaran.create') }}"
        class="btn btn-primary">

        + Tambah Pembayaran

    </a>

</div>

</div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Tanggal Bayar</th>
                            <th>Metode</th>
                            <th>Status</th>
                            <th>Bukti</th>
                            <th width="170">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($pembayarans as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $item->warga->nama_kepala_keluarga }}
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

                                {{ $item->tanggal_bayar }}

                            </td>

                            <td>

                                {{ $item->metode_pembayaran }}

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

                            <td>

                                @if($item->bukti_pembayaran)

                                    <a
                                        href="{{ asset('uploads/bukti/'.$item->bukti_pembayaran) }}"
                                        target="_blank"
                                        class="btn btn-info btn-sm">

                                        Lihat

                                    </a>

                                @else

                                    -

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ route('pembayaran.edit',$item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('pembayaran.destroy',$item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10" class="text-center">

                                Belum ada data pembayaran

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection