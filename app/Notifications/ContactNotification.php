<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    public $toUser;
    public $fromUser;
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($toUser, $fromUser, $message)
    {
        //
        $this->toUser = $toUser;
        $this->fromUser = $fromUser;
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
        $toUser = $this->toUser;
        $fromUser = $this->fromUser;

        return (new MailMessage)
                    ->subject('New Message Received') 
                    ->greeting('Hello '.@$toUser->name)
                    ->line($fromUser->name.' send you new Message.')
                    ->line('')
                    ->salutation("\r\n\r\n Regards,  \r\n Camlann.");
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
