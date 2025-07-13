<?php

namespace App\Notifications;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PropertyListedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Property $property)
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
            ->subject('New Property Listed Notification')
            ->greeting("Hello {$this->property->sellRequest->name}")
            ->line("We are pleased to inform you that your property has been listed successfully")
            ->line("Property Details Info:")
            ->line("Title: {$this->property->title}")
            ->line("Status: {$this->property->sellRequest->status}")
            ->action('Listed properties', url('/'))
            ->line('Thank you for using' . config('app.name') . '!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    { return [
            'sell_request_id' => $this->property->id,
            'user' => $this->property->sellRequest->name,
            'email' => $this->property->sellRequest->email,
        ];
    }
}
