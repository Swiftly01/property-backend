<?php

namespace App\Listeners;

use App\Events\ActivityLogged;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogActivity
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
    public function handle(ActivityLogged $event): void
    {
        ActivityLog::create([
            'action' => $event->action,
            'type' => $event->type,
            'performed_by' => $event->performedBy,
        ]);
    }
}
