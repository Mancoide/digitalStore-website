<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Icons\IconFinder;

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
    public function boot(IconFinder $iconFinder) : void
    {
        $iconFinder->registerIconDirectory('fa', public_path('assets/fontawesome/svgs/solid'));
    }
}
