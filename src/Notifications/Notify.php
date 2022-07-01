<?php

namespace Leeuwenkasteel\Messages\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Leeuwenkasteel\Messages\Channels\FcmChannel;

class Notify extends Notification{
    public $details;

    public function __construct($details){
        $this->details = $details;
    }

    public function via($notifiable){
        return ['mail', 'database', FcmChannel::class];
    }

    public function toMail($notifiable){
        return (new MailMessage)
            ->line("Your post '' was accepted")
            ->action('Notification Action', url("/posts"))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable){
        return [
            'message' => $this->details['message']
        ];
    }

    public function toVoice($notifiable){
        
    }
}