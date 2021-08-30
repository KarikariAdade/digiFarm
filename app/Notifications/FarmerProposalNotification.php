<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FarmerProposalNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $farmer = User::query()->where('id', $this->details['user_id'])->first();

        return (new MailMessage)
            ->subject('No-Reply: New Proposal from '.$farmer->name)
            ->line($farmer->name.' has submitted a new proposal to your request')
            ->line('Kindly click the button to visit your Dashboard to view the proposal')
            ->action('Dashboard', route('business.dashboard.proposal.index'))
            ->line('Thank you for using digiFarm!');
    }


    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Proposal Request',
            'data' => 'New Proposal Request',
            'message' => 'New Proposal Request'
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
