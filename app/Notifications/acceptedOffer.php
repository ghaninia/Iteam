<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class acceptedOffer extends Notification
{
    public $team ;
    public function __construct($team)
    {
        $this->team = $team ;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->view("mail.acceptoffer" , [
                'user' => $notifiable ,
                'team' => $this->team
            ])
            ->subject( trans("dash.team.offers.mail.subject") ) ;
    }

    public function toArray($notifiable)
    {
        return [

        ];
    }
}
