<?php

namespace App\Notifications;

use App\Models\Vendor;
use App\NotificationChannel\PushChannel;
use App\NotificationClient\FCM;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class VendorPushNotification extends Notification
{
    use Queueable;

    public Vendor $vendor;
    public $title;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @param Vendor vendor$
     * @param $title
     * @param $message
     */
    public function __construct(Vendor $vendor, $title, $message)
    {
        $this->vendor = $vendor;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed vendor$
     * @return array
     */
    public function via($vendor)
    {
        return [PushChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     */
    public function toPush($vendor)
    {
        (new FCM(
            $vendor->device_token,
            $this->title,
            $this->message,
        ))->send();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
