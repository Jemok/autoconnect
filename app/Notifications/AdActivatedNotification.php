<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdActivatedNotification extends Notification
{
    use Queueable;

    protected $contact;

    protected $vehicle;

    protected $start;

    protected $stop;

    protected $payment;

    protected $package;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contact,
                                $vehicle,
                                $start,
                                $stop,
                                $payment,
                                $package)
    {
        $this->contact = $contact;
        $this->vehicle = $vehicle;
        $this->start = $start;
        $this->stop = $stop;
        $this->payment = $payment;
        $this->package = $package;
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
            ->subject('Univas Auto Connect, Ad Activated')
            ->greeting('Hello '.$this->contact->name)
            ->line('Your Ad for '.$this->vehicle->car_make->name.' '.$this->vehicle->car_model->name. ' has been activated.')
            ->line('Period : 30 day')
            ->line('Package : '.$this->package)
            ->line('From : '.$this->start.' To : '.$this->stop)
            ->action('Manage Vehicle Ad Here', url('/'))
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
