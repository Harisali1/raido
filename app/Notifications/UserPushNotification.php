<?php

namespace App\Notifications;

use App\Models\User;
use App\NotificationChannel\PushChannel;
use App\NotificationClient\FCM;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class UserPushNotification extends Notification
{
    use Queueable;
    public User $user;
    public $title;
    public $message;


    /**
     * Create a new notification instance.
     *
     * @param User $user
     * @param $title
     * @param $message
     */
    public function __construct(User $user, $title, $message)
    {
        $this->user = $user;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $user
     * @return array
     */
    public function via($user)
    {
        return [ PushChannel::class ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $user
     * @return boolean
     */
    public function toPush($user)
    {
        return (new FCM(
            $user->device_token,
            $this->title,
            $this->message,
        ))->send();
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
