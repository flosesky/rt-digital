@extends('layouts.admin')

@section('content')

<h3 class="mb-4">

    Edit Iuran

</h3>

<div class="card shadow">

    <div class="card-body">

        <form
            action="{{ route('iuran.update',$iuran->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Bulan</label>

                <select
                    name="bulan"
                    class="form-select"
                    required>

                    @php

                    $bulan = [
                        'Januari','Februari','Maret','April','Mei','Juni',
                        'Juli','Agustus','September','Oktober','November','Desember'
                    ];

                    @endphp

                    @foreach($bulan as $b)

                    <option
                        value="{{ $b }}"
                        {{ $iuran->bulan==$b ? 'selected' : '' }}>

                        {{ $b }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Tahun</label>

                <input
                    type="number"
                    name="tahun"
                    value="{{ $iuran->tahun }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>Nominal</label>

                <input
                    type="number"
                    name="nominal"
                    value="{{ $iuran->nominal }}"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-primary">

                Update

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