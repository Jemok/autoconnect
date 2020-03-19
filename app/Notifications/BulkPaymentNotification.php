<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BulkPaymentNotification extends Notification
{
    use Queueable;

    protected $bulk_import;

    protected $bulk_import_approval;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bulk_import,
                                $bulk_import_approval)
    {
        $this->bulk_import = $bulk_import;
        $this->bulk_import_approval = $bulk_import_approval;
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
            ->subject( env('APP_NAME').' Bulk Upload Bath no '.$this->bulk_import->id.' Payment')
            ->line('Hello, '.$notifiable->name.' Please make your payment by clicking the link below')
            ->action('Make Payment', env('APP_URL').'/pay-for-bulk/'.$this->bulk_import->id)
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
