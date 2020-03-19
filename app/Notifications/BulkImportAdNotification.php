<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BulkImportAdNotification extends Notification
{
    use Queueable;

    protected $bulk_import;

    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bulk_import,
                                $user)
    {

        $this->bulk_import = $bulk_import;

        $this->user = $user;
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
                    ->subject( env('APP_NAME').' Your Ads for Bulk Batch No '.$this->bulk_import->id.' has been started')
                    ->line('Hello '.$this->user->name)
                    ->line(env('APP_NAME').' Your Ads for Bulk Batch No '.$this->bulk_import->id.' has been started')
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
