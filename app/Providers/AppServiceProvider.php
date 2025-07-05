<?php

namespace App\Providers;

use App\Interfaces\SellRequestInterface;
use App\Repositories\SellRequestRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(SellRequestInterface::class, SellRequestRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
