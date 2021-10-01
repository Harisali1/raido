<?php

namespace App\Notifications;

use App\Models\Driver;
use App\NotificationChannel\PushChannel;
use App\NotificationClient\FCM;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DriverPushNotification extends Notification
{
    use Queueable;
    public Driver $driver;
    public $title;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @param User $driver
     * @param $title
     * @param $message
     */
    public function __construct(Driver $driver, $title, $message)
    {
        $this->driver = $driver;
        $this->title = $title;
        $this->message  = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $driver
     * @return array
     */
    public function via($driver)
    {
        return [ PushChannel::class ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $driver
     * @return boolean
     */
    public function toPush($driver)
    {
        return (new FCM(
            $driver->device_token,
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
