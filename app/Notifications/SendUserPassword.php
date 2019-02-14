<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendUserPassword extends Notification
{
    use Queueable;

    protected $contact;

    protected $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contact, $password)
    {
        $this->contact = $contact;

        $this->password = $password;
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
            ->subject(env('APP_NAME').' LOGIN DETAILS')
            ->greeting('Hi '. $this->contact->name)
            ->line('Please find your login email and password below')
            ->line('Email :'. $this->contact->email)
            ->line('Password :'. $this->password)
            ->action('Login to '.env('APP_NAME'), url(env('APP_URL').'/login'))
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
