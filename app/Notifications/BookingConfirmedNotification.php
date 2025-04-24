<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmedNotification extends Notification
{
    use Queueable;

    protected $booking;


    /**
     * Create a new notification instance.
     */
    public function __construct(Booking $booking)
    {
        //
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // return (new MailMessage)
        //     ->line('The introduction to the notification.')
        //     ->action('Notification Action', url('/'))
        //     ->line('Thank you for using our application!');
        return (new MailMessage)
            ->subject('Your Booking Has Been Confirmed')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your booking for apartment "' . $this->booking->apartment->name . '" has been confirmed.')
            ->line('Start Date: ' . $this->booking->start_date)
            ->line('End Date: ' . $this->booking->end_date)
            ->line('Thank you for using our platform!');
            
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Your booking has been confirmed.',
            'booking_id' => $this->booking->id,
            'apartment' => $this->booking->apartment->name ?? '',
            'sent_at' => now()->toDateTimeString(),
            // 'url' => route('notifications.markAsRead', $this->booking->id), // Add this line for URL

        ];
    }
}
