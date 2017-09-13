<?php
$access_token = 'sIJ4G+8/3gh0q2ISi9WI1CGB8QwU57IzK+2N+Ni16/zzF6rHBTwOryDhV8aaXvksMrqXa3//kU5t4PaJfMOD9HVisCHqPOa/1F9BSe0H8zlRYNXbK0YAMi29/+gbHfh2p9ed3PzskUKGzqIloikGGwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
