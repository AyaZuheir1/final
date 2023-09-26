<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\AdminReviewedYourRequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SentNotificationToUser
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
    public function handle(object $event): void
    {
        $user_id = $event->bookingRequest->user_id;
        $user = User::findOrFail($user_id);
        $user->notify(new AdminReviewedYourRequestNotification($event->bookingRequest));
    }
}
