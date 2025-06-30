<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = false;

    public $incrementing = true;

    // Sesuaikan fillable dengan nama kolom di database Anda
    protected $fillable = [
        'id_pelanggan',
        'nama_pelanggan',  // Sesuaikan dengan nama kolom di database
        'alamat',          // Sesuaikan dengan nama kolom di database
        'nomor_telepon',   // Sesuaikan dengan nama kolom di database
        'membership',      // Sesuaikan dengan nama kolom di database
        'id_karyawan'      // Sesuaikan dengan nama kolom di database
    ];

    // Method ini akan mengizinkan akses melalui $pelanggan->id
    public function getIdAttribute()
    {
        return $this->attributes['id_pelanggan'];
    }
}