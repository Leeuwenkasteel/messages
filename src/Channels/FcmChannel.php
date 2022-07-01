<?php
namespace Leeuwenkasteel\Messages\Channels;
use Illuminate\Notifications\Notification;

class FcmChannel{
    public function send($notifiable, Notification $notification){
        $message = $notification->toFcm($notifiable);
 
        // Send notification to the $notifiable instance...
    }
}