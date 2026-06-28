@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h3 class="fw-bold mb-4">
        Edit Pembayaran
    </h3>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <form
                action="{{ route('pembayaran.update',$pembayaran->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">

                        Nama Warga

                    </label>

                    <select
                        name="warga_id"
                        class="form-select"
                        required>

                        @foreach($wargas as $warga)

                            <option
                                value="{{ $warga->id }}"
                                {{ $warga->id == $pembayaran->warga_id ? 'selected' : '' }}>

                                {{ $warga->nama_kepala_keluarga }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Periode Iuran

                    </label>

                    <select
                        name="iuran_id"
                        class="form-select"
                        required>

                        @foreach($iurans as $iuran)

                            <option
                                value="{{ $iuran->id }}"
                                {{ $iuran->id == $pembayaran->iuran_id ? 'selected' : '' }}>

                                {{ $iuran->bulan }}
                                {{ $iuran->tahun }}
                                -
                                Rp {{ number_format($iuran->nominal,0,',','.') }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Tanggal Bayar

                    </label>

                    <input
                        type="date"
                        name="tanggal_bayar"
                        value="{{ $pembayaran->tanggal_bayar }}"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Metode Pembayaran

                    </label>

                    <select
                        name="metode_pembayaran"
                        class="form-select"
                        required>

                        <option
                value="cash"
    {{ $pembayaran->metode_pembayaran=='cash' ? 'selected' : '' }}>
    Cash
</option>

<option
    value="qris"
    {{ $pembayaran->metode_pembayaran=='qris' ? 'selected' : '' }}>
    QRIS
</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required>

                        <option
    value="lunas"
    {{ $pembayaran->status=='lunas' ? 'selected' : '' }}>
    Lunas
</option>

<option
    value="belum_bayar"
    {{ $pembayaran->status=='belum_bayar' ? 'selected' : '' }}>
    Belum Bayar
</option>
                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Bukti Pembayaran

                    </label>

                    <input
                        type="file"
                        name="bukti_pembayaran"
                        class="form-control">

                </div>

                @if($pembayaran->bukti_pembayaran)

                    <div class="mb-3">

                        <img
                            src="{{ asset('uploads/bukti/'.$pembayaran->bukti_pembayaran) }}"
                            width="200">

                    </div>

                @endif

                <button
                    class="btn btn-primary">

                    Update

                </button>

                <a
                    href="{{ route('pembayaran.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection