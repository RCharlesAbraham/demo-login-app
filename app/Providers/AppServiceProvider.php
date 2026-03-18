<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if ($this->app->environment('production')) {
            $rootUrl = config('app.url');

            if (! empty($rootUrl)) {
                URL::forceRootUrl($rootUrl);
            }

            URL::forceScheme('https');
        }
    }
}
