<?php

$_GET['function']();

function sendPushNotification($fcm_token, $title, $message, $id = null,$action = null) {  
     
    $url = "https://fcm.googleapis.com/fcm/send";            
    $header = [
        'authorization: key=AAAAAEXRGZg:APA91bE2IBAdqStnDkMh9unOtxgoDZFJ3U17LSEBGElJIh9_qSErszmn8se7QPFVzMaQ96YTpuB4OR8OedCL6PTJ6AEWg0jHKX2wQi0oPVIgWyadbghPRWzybM1iFRe0WCZomcJKns7P',
        'content-type: application/json'
    ];    
 
    $notification = [
        'title' =>$title,
        'body' => $message
    ];
    $extraNotificationData = ["message" => $notification,"id" =>$id,'action'=>$action];
 
    $fcmNotification = [
        'to'        => $fcm_token,
        'notification' => $notification,
        'data' => $extraNotificationData
    ];
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
 
    $result = curl_exec($ch);    
    curl_close($ch);
 
    return $result;
}

function sendNotif(){
    $title = $_POST['title'] ?: "null";
    $body = $_POST['body'] ?: "null";

    sendPushNotification("cb2k55LS9TY:APA91bFtomNWND0AtKXutrJ1rxeDRNkrSGRwhbMc6_IPSezCI_vzX4F5Mcb5PF25YeujZ6BC_obJLK4jZCpK6knMxQxGl8jJ2FKlOEqrAIbEUJk3pHgf_Z0JkFwmlzJE_-YSvSMeoptx",$title,$body,123456,"notif");

}
