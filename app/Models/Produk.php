<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'nama',
        'jenis',
        'harga',
        'stok',
        'tanggal_kadaluwarsa',
        'deskripsi_produk',
        'id_pembayaran'
    ];

    // Method ini akan mengizinkan akses melalui $produk->id
    public function getIdAttribute()
    {
        return $this->attributes['id_produk'];
    }
}