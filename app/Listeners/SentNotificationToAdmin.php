<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Notifications\NewRequestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SentNotificationToAdmin
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
        $admins = Admin::all();
        foreach ($admins as $admin){
            $admin->notify(new NewRequestNotification($event->bookingRequest));
        }
    }
}
