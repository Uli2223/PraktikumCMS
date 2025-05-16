<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'PEMBAYARAN';
    protected $primaryKey = 'ID_PEMBAYARAN';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = [
        'ID_PEMBAYARAN',
        'METODE_PEMBAYARAN',
        'TANGGAL_PEMBAYARAN',
        'STATUS_PEMBAYARAN',
        // Tambahkan kolom lain sesuai struktur tabel Anda
    ];
    
    protected $casts = [
        'ID_PEMBAYARAN' => 'integer',
        'TANGGAL_PEMBAYARAN' => 'date',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class, 'ID_PEMBAYARAN', 'ID_PEMBAYARAN');
    }
}