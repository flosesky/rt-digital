@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Data Iuran</h3>

    <a href="{{ route('iuran.create') }}" class="btn btn-primary">

        + Tambah Iuran

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

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Nominal</th>
                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($iurans as $iuran)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $iuran->bulan }}</td>

                    <td>{{ $iuran->tahun }}</td>

                    <td>

                        Rp {{ number_format($iuran->nominal,0,',','.') }}

                    </td>

                    <td>

                        <a
                            href="{{ route('iuran.edit',$iuran->id) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('iuran.destroy',$iuran->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data iuran?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada data iuran.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection