<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Spatie\Permission\Models\Role;

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
<<<<<<< HEAD
    public function boot()
    {
        Blade::directive('role', function ($roleName) {
            $role = Role::where('name', $roleName)->first();
            if ($role) {
                return "<?php if(auth()->check() && auth()->user()->hasRole({$role->id})): ?>";
            }
            return "<?php if(false): ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });

=======

    public function boot()
    {
>>>>>>> ccbfd28f4f97e3757ae2fb5a31b80331c4d0b181

        Blade::component('auth-validation-errors', \App\View\Components\AuthValidationErrors::class);
        Blade::component('label', \App\View\Components\Label::class);
    }
}
