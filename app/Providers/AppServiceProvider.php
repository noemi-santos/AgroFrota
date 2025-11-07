<?php

namespace App\Providers;
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
        //
        View::composer('*', function ($view) {
            $layout = (auth()->check() && auth()->user()->access === 'ADM')
                ? 'layouts.admin'
                : 'layouts.default';

            $view->with('layout', $layout);
        });
    }
}
