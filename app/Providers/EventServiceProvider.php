<?php

namespace App\Providers;

use App\Events\ActivityLogged;
use App\Listeners\LogActivity;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{  
    protected $listen = [
        ActivityLogged::class => [
            LogActivity::class,
        ],
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
