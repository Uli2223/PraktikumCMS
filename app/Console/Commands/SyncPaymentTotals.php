<?php

namespace App\Console\Commands;

use App\Models\Pembayaran;
use Illuminate\Console\Command;

class SyncPaymentTotals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync payment totals with product prices';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $payments = Pembayaran::with('produk')->get();

        foreach ($payments as $payment) {
            $total = $payment->produk->sum('harga');
            $payment->update(['jumlah_pembayaran' => $total]);
        }

        $this->info('Total pembayaran berhasil disinkronisasi');
    }
}