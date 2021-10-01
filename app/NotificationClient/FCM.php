<?php

namespace App\NotificationClient;

use Illuminate\Support\Facades\Http;

class FCM
{
    public $serverKey;
    public $deviceToken;
    public $title;
    public $message;

    public function __construct($deviceToken, $title, $message)
    {

        $this->serverKey = env('SERVER_API_KEY_FCM');
        $this->deviceToken = $deviceToken;
        $this->title = $title;
        $this->message = $message;

    }

    public function send()
    {
        $message = [
            "registration_ids" => [ $this->deviceToken ],
            "notification"     => [
                'title' => $this->title,
                'body'  => $this->message,
                'sound' => 'default',
                'image' => null,
                'mutable_content' => false
            ],
            "data" => [
                "image_url" => null
            ]
        ];

//        $url = 'https://fcm.googleapis.com/fcm/send';
        $headers = [
            'Authorization: key=' . $this->serverKey,
            'Content-Type: application/json'
        ];

         $ch = curl_init();
         curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
         curl_setopt( $ch,CURLOPT_POST, true );
         curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
         curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
         curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
         curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $message ) );
         $result = curl_exec($ch );
         curl_close( $ch );

//        $response = Http::withHeaders($headers)->post($url, $message);
//         dd($response);
//        return $response->ok();
    }
}
