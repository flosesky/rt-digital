<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use App\Models\Iuran;
use App\Models\Pembayaran;

class LaporanController extends Controller
{
    public function index()
    {
        $totalWarga = Warga::count();

        $totalIuran = Iuran::sum('nominal');

        $totalPemasukan = Pembayaran::where('status', 'lunas')
            ->with('iuran')
            ->get()
            ->sum(function ($item) {
                return $item->iuran->nominal;
            });

        return view(
            'admin.laporan.index',
            compact(
                'totalWarga',
                'totalIuran',
                'totalPemasukan'
            )
        );
    }
}