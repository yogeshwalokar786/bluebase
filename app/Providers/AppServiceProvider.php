<?php

namespace App\Providers;

use App\Models\ClientLogo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer(['partials.client-marquee', 'pages.*'], function ($view) {
            try {
                if (Schema::hasTable('client_logos')) {
                    $view->with('clientLogos', ClientLogo::active()->get());
                }
            } catch (\Throwable $e) {
                // Safe fallback if database is not yet migrated
            }
        });
    }
}
