<?php

namespace App\Listeners;

use App\Events\BuyRequestSubmitted;
use App\Jobs\NotifyAdminsOfBuyRequestJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminsOfBuyRequest implements ShouldQueue
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
    public function handle(BuyRequestSubmitted $event): void
    {
        NotifyAdminsOfBuyRequestJob::dispatch($event->buyRequest);
    }
}
