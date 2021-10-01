<?php

namespace App\Traits;

trait Notification
{

//    public function sendNotification($token, $msg)
//    {
//        $firebaseToken = $token;
//        $SERVER_API_KEY = env('SERVER_API_KEY_FCM');
//
//        $fields = [
//            'to'        => $firebaseToken,
//            'notification'  => $msg
//        ];
//
//        $headers = [
//            'Authorization: key=' . $SERVER_API_KEY,
//            'Content-Type: application/json'
//        ];
//
//        $ch = curl_init();
//        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
//        curl_setopt( $ch,CURLOPT_POST, true );
//        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
//        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
//        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
//        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
//        $result = curl_exec($ch );
//        curl_close( $ch );
//
//    }
}
