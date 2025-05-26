<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id_pembayaran',
        'metode_pembayaran',
        'jumlah_pembayaran',
        'id_pelanggan',
        'id_karyawan'
    ];

    // Method ini akan mengizinkan akses melalui $pembayaran->id
    public function getIdAttribute()
    {
        return $this->attributes['id_pembayaran'];
    }
    
    // Relasi dengan model Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
    
    // Relasi dengan model Karyawan (jika ada)
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }
    
    // Relasi dengan model Produk (one-to-many)
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_pembayaran', 'id_pembayaran');
    }
}