<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pembayaran;
use App\Observers\PembayaranObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // app/Providers/AppServiceProvider.php
    public function boot()
    {
        Pembayaran::observe(PembayaranObserver::class);
    }
}
