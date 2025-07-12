<?php

namespace App\Notifications;

use App\Models\BuyRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BuyRequestSubmittedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public BuyRequest $buyRequest)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('New Buy Request Notification.')
            ->line("{$this->buyRequest->firstname} submitted a buy request")
            ->action('View Request', url('/'))
            ->line('Please review it in the admin dashboard.')
            ->line('Thank you for using ' . config('app.name') . '!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'buy_request_id' => $this->buyRequest->id,
            'user' => $this->buyRequest->firstname,
            'email' => $this->buyRequest->email,
        ];
    }
}
