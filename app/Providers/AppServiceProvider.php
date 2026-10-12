<?php

namespace App\Providers;

use App\Support\Site;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Company information in the views: {{ Site::get('phone_mobile') }}, Site::lines('address'), Site::tel(...)
        AliasLoader::getInstance()->alias('Site', Site::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
