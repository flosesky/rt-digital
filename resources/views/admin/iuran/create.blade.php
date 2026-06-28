@extends('layouts.admin')

@section('content')

<h3 class="mb-4">

    Tambah Iuran

</h3>

<div class="card shadow">

    <div class="card-body">

        <form
            action="{{ route('iuran.store') }}"
            method="POST">

            @csrf

            <div class="mb-3">

                <label>Bulan</label>

                <select
                    name="bulan"
                    class="form-select"
                    required>

                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>

                </select>

            </div>

            <div class="mb-3">

                <label>Tahun</label>

                <input
                    type="number"
                    name="tahun"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>Nominal</label>

                <input
                    type="number"
                    name="nominal"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-success">

                Simpan

            </button>

            <a
                href="{{ route('iuran.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection