<?php

namespace App\Jobs;

use App\Models\Property;
use App\Notifications\PropertyListedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendPropertyListedNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Property $property)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->property->sellRequest?->notify(new PropertyListedNotification($this->property));
    }
}
