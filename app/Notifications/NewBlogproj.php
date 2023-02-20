<?php

namespace App\Notifications;

use App\Models\Blogproj;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBlogproj extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Blogproj $blogproj)
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
        ->subject("New Blogproj from {$this->blogproj->user->name}")
        ->greeting("New Blogproj from {$this->blogproj->user->name}")
        ->line(Str::limit($this->blogproj->message, 50))
        ->action('Go to Blogprojer', url('/'))
                    
                    ->line('Thank you for using our application!');
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
