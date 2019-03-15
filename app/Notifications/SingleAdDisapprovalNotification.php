<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SingleAdDisapprovalNotification extends Notification
{
    use Queueable;

    protected $vehicle_detail;

    protected $reason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vehicle_detail, $reason)
    {
        $this->vehicle_detail = $vehicle_detail;

        $this->reason = $reason;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(env('APP_NAME').' Disapproved, Singe Ad No : '.$this->vehicle_detail->id. ' was Disapproved')
            ->greeting('Hello '.$notifiable->name)
            ->line('Disapproved, Your Vehicle Ad, Vehicle No : '.$this->vehicle_detail->id. ' was Disapproved')
            ->line('Reason Being : '.$this->reason)
            ->action('Correct Now', env('APP_URL').'/single-ads/index/car-details/'.$this->vehicle_detail->id)
            ->line('Thank you for using'.env('APP_NAME'));
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
