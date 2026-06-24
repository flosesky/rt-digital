<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    protected $fillable = [
        'bulan',
        'tahun',
        'nominal'
    ];

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}