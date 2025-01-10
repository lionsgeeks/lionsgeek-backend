<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class Subscriber extends Notification implements ShouldQueue
{
    use Queueable;
    /**
     * Create a new notification instance.
     */
    public function __construct(public $subject, public $content)
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
        $unsubscribeUrl = url('http://localhost:3000/unsubscribe/' . Crypt::encrypt($notifiable->id) );
        return (new MailMessage)
            ->subject($this->subject)
            ->line($this->content)
            ->action('Click to see more', url('/'))
            ->line('Thank you!')
            ->markdown('vendor.notifications.email', [
                'unsubscribeUrl' => $unsubscribeUrl,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
