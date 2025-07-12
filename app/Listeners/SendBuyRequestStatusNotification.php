<?php

namespace App\Listeners;

use App\Events\BuyRequestStatusUpdated;
use App\Jobs\SendBuyRequestStatusNotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBuyRequestStatusNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BuyRequestStatusUpdated $event): void
    {
        SendBuyRequestStatusNotificationJob::dispatch($event->buyRequest);
    }
}
