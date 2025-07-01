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
        Schema::create('pembayaran_produk', function (Blueprint $table) {
            $table->foreignId('pembayaran_id')->constrained();
            $table->foreignId('produk_id')->constrained();
            $table->integer('jumlah')->default(1);
            $table->decimal('harga_saat_ini', 12, 2);
            $table->primary(['pembayaran_id', 'produk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_produk');
    }
};
