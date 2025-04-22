<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // <-- Import the Paginator facade

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
        // --- Add this line ---
        Paginator::useBootstrapFive(); // Tell Laravel to use Bootstrap 5 pagination views
        // If you were using Bootstrap 4, use: Paginator::useBootstrapFour();
        // If you were using Bootstrap 3, use: Paginator::useBootstrap();
        // ---------------------
    }
}