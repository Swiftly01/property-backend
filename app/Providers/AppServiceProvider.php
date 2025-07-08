<?php

namespace App\Providers;

use App\Interfaces\PropertyInterface;
use App\Interfaces\SellRequestInterface;
use App\Repositories\PropertyRepository;
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
         $this->app->bind(PropertyInterface::class, PropertyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
