<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pembayaran::with(['warga', 'iuran'])
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Warga'      => $item->warga->nama_kepala_keluarga,
                    'Bulan'           => $item->iuran->bulan,
                    'Tahun'           => $item->iuran->tahun,
                    'Nominal'         => $item->iuran->nominal,
                    'Tanggal Bayar'   => $item->tanggal_bayar,
                    'Metode'          => $item->metode_pembayaran,
                    'Status'          => $item->status,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Warga',
            'Bulan',
            'Tahun',
            'Nominal',
            'Tanggal Bayar',
            'Metode',
            'Status',
        ];
    }
}