<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Event;
use App\Models\User;

class UpdateEventWhenSomeoneEdit extends Notification
{
    use Queueable;
    public Event $event;
    public User $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(Event $event,User $user)
    {
        $this->event = $event;
        $this->user = $user;
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
        $eventTitle = $this->event->title;
        $eventId = $this->event->id;
        $username = $this->user->name;
        return (new MailMessage)
                    ->line($username)
                    ->line( 'Update your event  ' .$eventTitle )
                    ->action('Check it out your event', url('/event/detail/'.$eventId));
                    // ->line('Someone');
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
