<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'metode_pembayaran',
        'jumlah_pembayaran',
        'id_pelanggan',
        'id_karyawan'
    ];

    // app/Models/Pembayaran.php
    protected static function booted()
    {
        static::updated(function ($pembayaran) {
            // Jika ada perubahan produk, update jumlah
            if ($pembayaran->isDirty() || $pembayaran->produk()->isDirty()) {
                $total = $pembayaran->produk->sum('harga');
                $pembayaran->updateQuietly(['jumlah_pembayaran' => $total]);
            }
        });
        
        static::deleted(function ($pembayaran) {
            // Reset produk terkait saat pembayaran dihapus
            $pembayaran->produk()->update(['id_pembayaran' => null]);
        });
    }

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

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_pembayaran', 'id_pembayaran');
    }
}