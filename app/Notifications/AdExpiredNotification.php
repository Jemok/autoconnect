<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdExpiredNotification extends Notification
{
    use Queueable;

    protected $vehicle_detail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vehicle_detail)
    {
        $this->vehicle_detail = $vehicle_detail;
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
            ->subject( env('APP_NAME').' Your Ad With the ID : '. $this->vehicle_detail->unique_identifier. ' has expired. ')
            ->action('Renew Your Ad Here', url('/'))
            ->line('Thank you for using '. env('APP_NAME'));
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
