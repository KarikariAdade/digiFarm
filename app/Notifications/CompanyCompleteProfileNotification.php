<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyCompleteProfileNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $business;

    /**
     * Create a new notification instance.
     *
     * @param $business
     */
    public function __construct($business)
    {
        $this->business = $business;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $first_message = $this->business['name'];
        return (new MailMessage)
                    ->subject('No-Reply: Profile Setup Complete')
                    ->line($first_message. ', Your account profile set up is complete')
                    ->line('You will receive an email when your account is verified by digiFarm')
                    ->line('Kindly click the button to visit your Dashboard')
                    ->action('Dashboard', route('business.dashboard'))
                    ->line('Thank you for using digiFarm!');
    }


    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Profile Setup Complete',
            'data' => 'Profile Setup Complete',
            'message' => 'This is the message'
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
