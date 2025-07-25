<?php

namespace App\Providers;

use App\Interfaces\BuyRequestInterface;
use App\Interfaces\PropertyInterface;
use App\Interfaces\SellRequestInterface;
use App\Models\BuyRequest;
use App\Repositories\BuyRequestRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\SellRequestRepository;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(SellRequestInterface::class, SellRequestRepository::class);
        $this->app->bind(PropertyInterface::class, PropertyRepository::class);
        $this->app->bind(BuyRequestInterface::class, BuyRequestRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        $buyRequestsCount = BuyRequest::count();
        View::share('buyRequestsCount', $buyRequestsCount);

        Schema::defaultStringLength(191);

        if (request()->is('admin/*')) {
            Paginator::useTailwind();
        } else {
            Paginator::useBootstrapFive();
        }
    }
}
