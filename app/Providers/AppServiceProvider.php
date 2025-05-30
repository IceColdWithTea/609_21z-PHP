<?php

namespace App\Providers;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-dish', function (User $user, Dish $dish) {
            return $user->is_admin == 1 && $dish->category->name == 'Суп';
        });
    }
}
