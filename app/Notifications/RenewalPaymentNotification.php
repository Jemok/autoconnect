<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RenewalPaymentNotification extends Notification
{
    use Queueable;

    protected $amount;

    protected $name;

    protected $vehicle;

    /**
     * PaymentReceivedNotification constructor.
     * @param $amount
     * @param $name
     * @param $vehicle
     */
    public function __construct($amount,
                                $name,
                                $vehicle)
    {
        $this->amount = $amount;
        $this->name = $name;
        $this->vehicle = $vehicle;
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
            ->subject('Univas Auto Connect: Ad REACTIVATED : KES '.$this->amount.' received')
            ->greeting('Hello '.$this->name )
            ->line('The is to inform you that your payment of KES '.number_format($this->amount, 2).' for '.$this->vehicle.' has been received and your Ad has been reactivated.')
            ->line('Thank you for using '.env('APP_NAME'));
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
