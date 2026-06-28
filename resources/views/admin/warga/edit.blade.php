@extends('layouts.admin')

@section('content')

<h3 class="mb-4">

    Edit Warga

</h3>

<div class="card shadow">

    <div class="card-body">

        <form
            action="{{ route('warga.update',$warga->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama Kepala Keluarga</label>

                <input
                    type="text"
                    name="nama_kepala_keluarga"
                    class="form-control"
                    value="{{ $warga->nama_kepala_keluarga }}"
                    required>

            </div>

            <div class="mb-3">

                <label>Alamat</label>

                <textarea
                    name="alamat"
                    class="form-control"
                    rows="3"
                    required>{{ $warga->alamat }}</textarea>

            </div>

            <div class="mb-3">

                <label>Nomor Rumah</label>

                <input
                    type="text"
                    name="nomor_rumah"
                    class="form-control"
                    value="{{ $warga->nomor_rumah }}"
                    required>

            </div>

            <div class="mb-3">

                <label>No HP</label>

                <input
                    type="text"
                    name="nomor_hp"
                    class="form-control"
                    value="{{ $warga->nomor_hp }}"
                    required>

            </div>

            <button class="btn btn-primary">

                Update

            </button>

            <a
                href="{{ route('warga.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

@endsection