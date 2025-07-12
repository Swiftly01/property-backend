<?php

namespace App\Providers;

use App\Events\ActivityLogged;
use App\Events\BuyRequestStatusUpdated;
use App\Events\BuyRequestSubmitted;
use App\Listeners\LogActivity;
use App\Listeners\NotifyAdminsOfBuyRequest;
use App\Listeners\SendBuyRequestStatusNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        ActivityLogged::class => [
            LogActivity::class
        ],
        BuyRequestSubmitted::class => [
            NotifyAdminsOfBuyRequest::class
        ],
        BuyRequestStatusUpdated::class => [
            SendBuyRequestStatusNotification::class
        ]

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
