<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->string('metode_pembayaran');
            $table->decimal('jumlah_pembayaran', 15, 2);
            
            // Foreign keys
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_pelanggan');
            
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};