<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {
        \App\Models\Deal::observe(\App\Observers\DealObserver::class);
    }
}
