<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('اعادة كلمة المرور')
            ->line('لقد تلقيت رسالة لإعادة تعيين كلمة المرور، يمكنك إعادة تعيينها من خلال الرابط التالي:')
            ->action('استعادة كلمة المرور', url('password/reset', $this->token));
    }
}
