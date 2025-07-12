<?php

namespace App\Notifications;

use App\Models\BuyRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BuyRequestStatusNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public BuyRequest $buyRequest, public $message)
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
            ->subject('Booking Request Notification')
            ->greeting("Hello {$this->buyRequest->firstname}")
            ->line("{$this->message}")
            ->line("Request Details Info:")
            ->line("Booking ID: #BKGID{$this->buyRequest->id}")
            ->line("property ID: #PRPID{$this->buyRequest->property->id}")
            ->line("Property Title: {$this->buyRequest->property->title}")
            ->action('Support', url('/'))
           ->line('Thank you for using' . config('app.name') . '!');
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
            'email' => $this->buyRequest->email,
            'user' => $this->buyRequest->firstname,
        ];
    }
}
