<?php

namespace App\Observers;

use App\Models\Pembayaran;

class PembayaranObserver
{
    /**
     * Handle the Pembayaran "created" event.
     */
    public function created(Pembayaran $pembayaran): void
    {
        //
    }

    /**
     * Handle the Pembayaran "updated" event.
     */
    // app/Observers/PembayaranObserver.php
    public function updated(Pembayaran $pembayaran)
    {
        if ($pembayaran->isDirty('jumlah_pembayaran')) {
            // Jika jumlah diubah manual, sync dengan produk
            $totalProduk = $pembayaran->produk->sum('harga');
            if ($pembayaran->jumlah_pembayaran != $totalProduk) {
                $pembayaran->update(['jumlah_pembayaran' => $totalProduk]);
            }
        }
    }

    /**
     * Handle the Pembayaran "deleted" event.
     */
    public function deleted(Pembayaran $pembayaran): void
    {
        //
    }

    /**
     * Handle the Pembayaran "restored" event.
     */
    public function restored(Pembayaran $pembayaran): void
    {
        //
    }

    /**
     * Handle the Pembayaran "force deleted" event.
     */
    public function forceDeleted(Pembayaran $pembayaran): void
    {
        //
    }
}
