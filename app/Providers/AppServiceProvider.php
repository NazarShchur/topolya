<?php

namespace App\Providers;

use App\Model\AdditionalOrder;
use App\Model\Order;
use App\Model\Pavilion;
use App\Observers\AdditionalOrderObserver;
use App\Observers\PavilionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        AdditionalOrder::observe(AdditionalOrderObserver::class);
    }
}
