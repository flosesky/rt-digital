@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Data Pengumuman
        </h3>

        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
            + Tambah Pengumuman
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th width="70">No</th>
                            <th>Judul</th>
                            <th>Tanggal Publish</th>
                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($pengumumen as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <strong>{{ $item->judul }}</strong>

                                <br>

                                <small class="text-muted">

                                    {{ Str::limit($item->isi,80) }}

                                </small>

                            </td>

                            <td>

                                {{ $item->tanggal_publish }}

                            </td>

                            <td>

                                <a
                                    href="{{ route('pengumuman.edit',$item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('pengumuman.destroy',$item->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                Belum ada data pengumuman

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