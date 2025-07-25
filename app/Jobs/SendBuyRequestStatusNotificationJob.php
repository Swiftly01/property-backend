<?php

namespace App\Jobs;

use App\Enums\BuyRequestEnum;
use App\Models\BuyRequest;
use App\Notifications\BuyRequestStatusNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class SendBuyRequestStatusNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public BuyRequest $buyRequest)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {   
        $message = match($this->buyRequest->status){
             BuyRequestEnum::CONFIRMED->value => 'We are glad to inform you that your booking request has been confirmed.We will kindly reach out to you soon.',
             BuyRequestEnum::DECLINED->value => 'We are sorry to inform you that your booking request could not be approved at this time, Kindly reach out to our support',
             default => throw new InvalidArgumentException("Invalid status {$this->buyRequest->status}"),

        };

        Log::info($this->buyRequest->email);

        $this->buyRequest->notify(new BuyRequestStatusNotification($this->buyRequest, $message));
    }
}
