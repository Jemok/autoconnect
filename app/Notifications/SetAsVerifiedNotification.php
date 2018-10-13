<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SetAsVerifiedNotification extends Notification
{
    use Queueable;

    protected $vehicleDetail;

    protected $contact;

    /**
     * SetAsVerifiedNotification constructor.
     * @param $vehicleDetail
     * @param $contact
     */
    public function __construct($vehicleDetail, $contact)
    {
        $this->vehicleDetail = $vehicleDetail;
        $this->contact = $contact;
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
            ->subject('Univas Autoconnect, Your Ad has been verified')
            ->greeting('Hello '. $this->contact->name)
            ->line('This is to notify you that your car '.$this->vehicleDetail->car_make->name.' '.$this->vehicleDetail->car_model->name.' has been verified')
            ->action('Manage Vehicle Ad Here ', url('/'))
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
