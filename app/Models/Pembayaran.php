<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'warga_id',
        'iuran_id',
        'tanggal_bayar',
        'metode_pembayaran',
        'status',
        'bukti_pembayaran'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function iuran()
    {
        return $this->belongsTo(Iuran::class);
    }
}