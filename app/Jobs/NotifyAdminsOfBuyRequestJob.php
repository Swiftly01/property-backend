<?php

namespace App\Jobs;

use App\Models\BuyRequest;
use App\Models\User;
use App\Notifications\BuyRequestSubmittedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Throwable;

class NotifyAdminsOfBuyRequestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public BuyRequest $buyRequest) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $admins = User::where('email', 'NOT LIKE', '%example.com')->get();
        Notification::send($admins, new BuyRequestSubmittedNotification($this->buyRequest));
    }
}
