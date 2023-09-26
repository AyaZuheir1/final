<?php

namespace App\Notifications;

use App\Models\BookingRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminReviewedYourRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public BookingRequest $bookingRequest)
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
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Admin Reviewed Your Request')
        ->line('Hi ' . $notifiable->first_name)
        ->line('Admin Reviewed Your Request')
                    ->action('Your Requests', url(route('user.showUserRequests',$notifiable)))
                    ->line('Good Luck!');
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toDatabade(object $notifiable): DatabaseMessage
    {
        return new DatabaseMessage([
            'admin_id' => $this->bookingRequest->admin_id,
            'request_id' => $this->bookingRequest->id,
            'hall' => $this->bookingRequest->hall,
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
