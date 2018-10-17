<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    // use Queueable; implements ShouldQueue

    public $token ;
    public function __construct($token)
    {
        $this->token = $token ;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->view("mail.resetpassword" , [
                'token' => $this->token ,
                'user' => $notifiable
            ])
            ->subject( trans("auth.reset.text") ) ;
    }

    public function toArray($notifiable)
    {
        return [

        ];
    }
}
