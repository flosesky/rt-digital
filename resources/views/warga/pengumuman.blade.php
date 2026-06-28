@extends('layouts.warga')

@section('content')

<div class="card shadow">

    <div class="card-header bg-success text-white">

        <h4 class="mb-0">

            Pengumuman RT

        </h4>

    </div>

    <div class="card-body">

        @forelse($pengumumen as $item)

            <div class="border rounded p-3 mb-3">

                <h5>

                    {{ $item->judul }}

                </h5>

                <small class="text-muted">

                    {{ $item->created_at->format('d M Y') }}

                </small>

                <hr>

                <p>

                    {{ $item->isi }}

                </p>

            </div>

        @empty

            <div class="alert alert-warning">

                Belum ada pengumuman.

            </div>

        @endforelse

    </div>

</div>

@endsection