<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan'; // nama tabel di database
    protected $primaryKey = 'id_karyawan'; // primary key tabel
    public $timestamps = false; // tidak menggunakan timestamps
    
    public $incrementing = false;

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_karyawan', 
        'jabatan', 
        'alamat', 
        'nomor_telepon'
    ];

    // Method ini akan mengizinkan akses melalui $karyawan->id
    public function getIdAttribute()
    {
        return $this->attributes['id_karyawan'];
    }
}