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
        Schema::create('pembelian_produk', function (Blueprint $table) {
            $table->foreignId('id_pembelian')->constrained('pembelian');
            $table->foreignId('id_produk')->constrained('produk');
            $table->integer('jumlah');
            $table->decimal('harga_saat_ini', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();
            
            $table->primary(['id_pembelian', 'id_produk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_produk');
    }
};
