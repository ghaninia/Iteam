<?php
namespace App\Notifications;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerfiedEmailUser extends Notification implements ShouldQueue
{
    use Queueable;
    public static $toMailCallback;

    public function __construct()
    {
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage)
            ->view("mails.verify" ,[
                'token' => $this->verificationUrl($notifiable) ,
                'title' => 'فراموشی گذرواژه'
            ])
            ->subject('فراموشی گذرواژه') ;
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify', Carbon::now()->addMinutes(60) , ['id' => $notifiable->getKey()]
        );
    }

    public function toArray($notifiable)
    {
        return [
        ];
    }
}
