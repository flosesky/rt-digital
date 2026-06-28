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
        $totalWarga = Warga::count();

        $totalLunas = Pembayaran::where(
            'status',
            'lunas'
        )->count();

        $totalBelumBayar = Pembayaran::where(
            'status',
            'belum_bayar'
        )->count();

        $totalPengumuman = Pengumuman::count();

        $totalIuran = Iuran::sum('nominal');

        $totalPemasukan = Pembayaran::where(
            'status',
            'lunas'
        )->with('iuran')
        ->get()
        ->sum(function ($item) {
            return $item->iuran->nominal;
        });
$chartData = Pembayaran::select(
        DB::raw("strftime('%m', tanggal_bayar) as bulan"),
        DB::raw("COUNT(*) as total")
    )
    ->where('status', 'lunas')
    ->groupBy('bulan')
    ->orderBy('bulan')
    ->get();

$labels = [];
$data = [];

foreach ($chartData as $item) {

    $namaBulan = [
        '01'=>'Jan',
        '02'=>'Feb',
        '03'=>'Mar',
        '04'=>'Apr',
        '05'=>'Mei',
        '06'=>'Jun',
        '07'=>'Jul',
        '08'=>'Agu',
        '09'=>'Sep',
        '10'=>'Okt',
        '11'=>'Nov',
        '12'=>'Des'
    ];

    $labels[] = $namaBulan[$item->bulan];

    $data[] = $item->total;
}


        return view(
            'admin.dashboard',
            compact(
                'totalWarga',
                'totalLunas',
                'totalBelumBayar',
                'totalPengumuman',
                'totalIuran',
                'totalPemasukan',
                'labels',
                'data'
            )
        );
    }
}