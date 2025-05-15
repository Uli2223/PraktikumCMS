<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'PRODUK';
    protected $primaryKey = 'ID_PRODUK';
    public $timestamps = false;

    protected $fillable = [
        'NAMA',
        'JENIS',
        'HARGA',
        'STOK',
        'TANGGAL_KADALUWARSA',
        'DESKRIPSI_PRODUK',
        'ID_PEMBAYARAN',
    ];

    public function getRouteKeyName()
    {
        return 'ID_PRODUK';
    }
}
