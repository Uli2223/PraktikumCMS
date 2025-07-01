<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->foreignId('id_pelanggan')->constrained('pelanggan');
            $table->foreignId('id_karyawan')->constrained('karyawan');
            $table->decimal('total_harga', 12, 2);
            $table->string('metode_pembayaran');
            $table->string('status')->default('selesai');
            $table->dateTime('tanggal_pembelian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
