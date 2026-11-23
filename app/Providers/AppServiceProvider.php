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
        // Enforce canonical base URL in production to prevent /public from appearing in generated URLs
        if (request()->hasHeader('host')) {
            $host = request()->getHost();
            if (str_contains($host, 'bluebasetechnologies.com')) {
                \Illuminate\Support\Facades\URL::forceScheme('https');
                \Illuminate\Support\Facades\URL::forceRootUrl('https://bluebasetechnologies.com');
            }
        }

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
