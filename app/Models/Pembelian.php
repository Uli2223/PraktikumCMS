<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'PEMBELIAN';
    protected $primaryKey = 'ID_PEMBELIAN';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'ID_PELANGGAN',
        'ID_KARYAWAN',
        'TOTAL_HARGA',
        'METODE_PEMBAYARAN',
        'STATUS',
        'TANGGAL_PEMBELIAN'
    ];

    protected $dates = ['TANGGAL_PEMBELIAN'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'ID_PELANGGAN', 'ID_PELANGGAN');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'ID_KARYAWAN', 'ID_KARYAWAN');
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'PEMBELIAN_PRODUK', 'ID_PEMBELIAN', 'ID_PRODUK')
                   ->withPivot(['JUMLAH', 'HARGA_SAAT_INI', 'SUBTOTAL']);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'ID_PEMBELIAN', 'ID_PEMBELIAN');
    }
}