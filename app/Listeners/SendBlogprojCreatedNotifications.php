<?php

namespace App\Listeners;

use App\Events\BlogprojCreated;
use App\Models\User;
use App\Notifications\NewBlogproj;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBlogprojCreatedNotifications implements ShouldQueue
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
    public function handle(BlogprojCreated $event): void
    {
        foreach (User::whereNot('id', $event->blogproj->user_id)->cursor() as $user) {
            $user->notify(new NewBlogproj($event->blogproj));
        }
    }
}
