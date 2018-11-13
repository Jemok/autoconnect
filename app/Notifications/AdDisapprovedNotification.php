<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdDisapprovedNotification extends Notification
{
    use Queueable;

    protected $user_bulk_import;

    protected $reason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_bulk_import, $reason)
    {
        $this->user_bulk_import = $user_bulk_import;

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
            ->subject(env('APP_NAME').' Disapproved, Bulk Vehicle No : '.$this->user_bulk_import->id. ' Batch No : '.$this->user_bulk_import->bulk_import_id.' was Disapproved')
            ->greeting('Hello '.$notifiable->name)
            ->line('Disapproved, Your Vehicle Ad, Bulk Vehicle No : '.$this->user_bulk_import->id. ' Batch No : '.$this->user_bulk_import->bulk_import_id.' was Disapproved')
            ->line('Reason Being : '.$this->reason)
            ->action('Correct Now', env('APP_URL').'/vehicles/create-bulk-pictures/'.$this->user_bulk_import->bulk_import_id.'/'.$this->user_bulk_import->id)
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
