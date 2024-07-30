<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
    public function boot(): void
    {
        Blade::directive('ymddate', function ($expression) {
            list($date) = $expression;

            return \Carbon\Carbon::parse($date)->format('d-m-Y');
        });

        Blade::directive('ymdtimedate', function ($expression) {
            list($date) = $expression;

            return \Carbon\Carbon::parse($date)->format('d-m-Y').' pada '.\Carbon\Carbon::parse($date)->format('H:i');
        });
        
        Paginator::useBootstrap();
    }
}
