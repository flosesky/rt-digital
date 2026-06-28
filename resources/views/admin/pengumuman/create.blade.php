@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <h3 class="fw-bold mb-4">

        Tambah Pengumuman

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

            <form action="{{ route('pengumuman.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">

                        Judul

                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Isi Pengumuman

                    </label>

                    <textarea
                        name="isi"
                        rows="6"
                        class="form-control"
                        required></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Tanggal Publish

                    </label>

                    <input
                        type="date"
                        name="tanggal_publish"
                        class="form-control"
                        required>

                </div>

                <button class="btn btn-success">

                    Simpan

                </button>

                <a
                    href="{{ route('pengumuman.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection