<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use App\Models\Pembayaran;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalWarga = Warga::count();

        $totalLunas = Pembayaran::where('status', 'lunas')->count();

        $totalBelumBayar = Pembayaran::where(
            'status',
            'belum_bayar'
        )->count();

        return view(
            'admin.dashboard',
            compact(
                'totalWarga',
                'totalLunas',
                'totalBelumBayar'
            )
        );
    }
}