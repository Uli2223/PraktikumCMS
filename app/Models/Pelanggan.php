<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    
    // Define the table name explicitly
    protected $table = 'pelanggan';
    
    // Define primary key
    protected $primaryKey = 'ID_PELANGGAN';
    
    // Disable timestamps (created_at and updated_at)
    public $timestamps = false;
    
    // Define fillable fields
    protected $fillable = [
        'ID_PELANGGAN',
        'NAMA_PELANGGAN',
        'ALAMAT',
        'NOMOR_TELEPON',
        'RIWAYAT_PEMBELIAN',
        'ID_KARYAWAN'
    ];
    
    // You can define relationships here if needed
    // Example: relationship with Karyawan model
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'ID_KARYAWAN', 'id');
    }
}