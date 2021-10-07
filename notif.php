<?php

$title = $_POST['title'] ?: "";
$message = $_POST['message'] ?: "";

$registrasion_ids = "cb2k55LS9TY:APA91bFtomNWND0AtKXutrJ1rxeDRNkrSGRwhbMc6_IPSezCI_vzX4F5Mcb5PF25YeujZ6BC_obJLK4jZCpK6knMxQxGl8jJ2FKlOEqrAIbEUJk3pHgf_Z0JkFwmlzJE_-YSvSMeoptx";

$data1["title"] = $title;
$data1["body"] = $message;

// $data["registration_ids"] = $registrasion_ids;
$data["notification"] = $data1;


$curl = curl_init();
$autkey = "key=AAAAAEXRGZg:APA91bE2IBAdqStnDkMh9unOtxgoDZFJ3U17LSEBGElJIh9_qSErszmn8se7QPFVzMaQ96YTpuB4OR8OedCL6PTJ6AEWg0jHKX2wQi0oPVIgWyadbghPRWzybM1iFRe0WCZomcJKns7P";
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    'Content-type: application/json',
    'Authorization: ' . $autkey
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

echo $title;
echo $message;
