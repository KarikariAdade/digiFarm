<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProposalAcceptNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        $data = $this->data;
        return (new MailMessage)
            ->subject('No-Reply: Proposal Approved!!!')
            ->line($data['name']. ', Your proposal to '.$data['company_name'].' has been approved')
            ->line($data['company_name'].' would like to do business with you')
            ->line('Kindly click the button to visit your Dashboard')
            ->action('Dashboard', route('home'))
            ->line('Thank you for using digiFarm!');
    }


    public function toDatabase($notifiable)
    {
        $data = $this->data;

        return [
            'title' => 'Proposal Approved',
            'data' => 'Proposal Approval Message',
            'message' => $data['name']. ', Your proposal to '.$data['company_name'].' has been approved'
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
