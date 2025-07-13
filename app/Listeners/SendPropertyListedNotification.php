<?php

namespace App\Listeners;

use App\Events\PropertyListed;
use App\Jobs\SendPropertyListedNotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPropertyListedNotification implements ShouldQueue
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
    public function handle(PropertyListed $event): void
    {
        SendPropertyListedNotificationJob::dispatch($event->property);
    }
}
