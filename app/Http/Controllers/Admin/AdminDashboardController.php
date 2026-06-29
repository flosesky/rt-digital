<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use App\Models\Pembayaran;
use App\Models\Pengumuman;
use App\Models\Iuran;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $totalWarga = Warga::count();

        $totalLunas = Pembayaran::where('status', 'lunas')->count();

        $totalBelumBayar = Pembayaran::where('status', 'belum_bayar')->count();

        $totalPengumuman = Pengumuman::count();

        $totalIuran = Iuran::sum('nominal');

        // Total pemasukan
        $totalPemasukan = Pembayaran::where('status', 'lunas')
            ->with('iuran')
            ->get()
            ->sum(function ($item) {
                return optional($item->iuran)->nominal ?? 0;
            });

        // Grafik pembayaran per bulan (PostgreSQL)
        $chartData = Pembayaran::selectRaw("
                EXTRACT(MONTH FROM tanggal_bayar) as bulan,
                COUNT(*) as total
            ")
            ->where('status', 'lunas')
            ->groupByRaw("EXTRACT(MONTH FROM tanggal_bayar)")
            ->orderByRaw("EXTRACT(MONTH FROM tanggal_bayar)")
            ->get();

        $namaBulan = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des',
        ];

        $labels = [];
        $data = [];

        foreach ($chartData as $item) {

            $bulan = (int) $item->bulan;

            $labels[] = $namaBulan[$bulan] ?? $bulan;

            $data[] = (int) $item->total;
        }

        return view('admin.dashboard', compact(
            'totalWarga',
            'totalLunas',
            'totalBelumBayar',
            'totalPengumuman',
            'totalIuran',
            'totalPemasukan',
            'labels',
            'data'
        ));
    }
}