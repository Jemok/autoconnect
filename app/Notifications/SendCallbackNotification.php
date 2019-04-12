<?php

namespace App\Notifications;

use App\Channels\AfricaIsTalking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendCallbackNotification extends Notification
{
//    use Queueable;

    protected $vehicle_detail;

    protected $user;

    protected $request_callback;

    protected $numbers;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vehicle_detail,
                                $user,
                                $request_callback,
                                $numbers,
                                $message)
    {
        $this->vehicle_detail = $vehicle_detail;
        $this->user = $user;
        $this->request_callback = $request_callback;
        $this->numbers = $numbers;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', AfricaIsTalking::class];
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
            ->subject(env('APP_NAME').' CALL ME BACK')
            ->greeting('Hi '. $this->user->name. ' Please call me back, Im interested about your Ad No: '. $this->vehicle_detail->unique_identifier.' '. $this->vehicle_detail->car_make->name.' '.$this->vehicle_detail->car_model->name)
            ->line('May Name is : '. $this->request_callback->first_name.' '.$this->request_callback->last_name)
            ->line('My Number is : '. $this->request_callback->phone_number)
            ->line('My Email is :'. $this->request_callback->email)
            ->action('View The Ad', url(env('APP_URL').'/single-car-view/'.$this->vehicle_detail->id))
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


    /**
     * @param $notifiable
     * @return array
     */
    public function toAfricaIsTalking($notifiable){

        return [
            'numbers' => $this->numbers,
            'message' => $this->message
        ];
    }
}
