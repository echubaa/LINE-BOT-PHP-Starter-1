<?php
$access_token = 'sIJ4G+8/3gh0q2ISi9WI1CGB8QwU57IzK+2N+Ni16/zzF6rHBTwOryDhV8aaXvksMrqXa3//kU5t4PaJfMOD9HVisCHqPOa/1F9BSe0H8zlRYNXbK0YAMi29/+gbHfh2p9ed3PzskUKGzqIloikGGwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v2/bot/message/push';
$replyId = ['Uec872a16e2dea9e3551b8a6ff583f684','Uef99b849d5948f2804d76f19ef9cc750'];
$messages = [
    'type' => 'text',
    'text' => "คิดถึงชั้นสักครั้งถ้าเธอไม่คิดถึงใคร ~~~~"
];
$data = [
    'to' => $replyId,
    'messages' => [$messages],
];
$post = json_encode($data);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
