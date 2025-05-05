<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan'; // nama tabel di database
    protected $primaryKey = 'id_karyawan'; // 👈 tambahkan ini

    // Jika tidak pakai timestamps created_at/updated_at:
    public $timestamps = false;

    // Kolom yang bisa diisi (optional)
    protected $fillable = [
        'nama_karyawan', 'jabatan', 'alamat', 'nomor_telepon'
    ];
    public function getIdAttribute()
{
    return $this->attributes['id_karyawan'];
}

}
?>