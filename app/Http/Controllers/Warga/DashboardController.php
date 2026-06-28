<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\Pembayaran;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $warga = Warga::where('user_id', $user->id)->first();

        $pengumumen = Pengumuman::latest()
            ->take(5)
            ->get();

        $pembayarans = collect();

        if ($warga) {

            $pembayarans = Pembayaran::with('iuran')
                ->where('warga_id', $warga->id)
                ->latest()
                ->get();

        }

        $statusIuran = 'belum';

        if ($pembayarans->isNotEmpty()) {

            $statusIuran = $pembayarans->first()->status;

        }

        $jumlahPengumuman = $pengumumen->count();

        $jumlahPembayaran = $pembayarans->count();

        return view('warga.dashboard', compact(
            'user',
            'warga',
            'pengumumen',
            'pembayarans',
            'statusIuran',
            'jumlahPengumuman',
            'jumlahPembayaran'
        ));
    }

    public function riwayat()
    {
        $user = Auth::user();

        $warga = Warga::where('user_id', $user->id)->first();

        $pembayarans = collect();

        if ($warga) {

            $pembayarans = Pembayaran::with('iuran')
                ->where('warga_id', $warga->id)
                ->latest()
                ->get();

        }

        return view('warga.riwayat', compact(
            'pembayarans'
        ));
    }

    public function pengumuman()
    {
        $pengumumen = Pengumuman::latest()->get();

        return view('warga.pengumuman', compact(
            'pengumumen'
        ));
    }
}