<?php

namespace App\Providers;

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

    public function boot()
    {

        Blade::component('auth-validation-errors', \App\View\Components\AuthValidationErrors::class);
        Blade::component('label', \App\View\Components\Label::class);
    }
}
