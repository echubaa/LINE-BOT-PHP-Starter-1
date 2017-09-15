<?php

$strAccessToken = "sIJ4G+8/3gh0q2ISi9WI1CGB8QwU57IzK+2N+Ni16/zzF6rHBTwOryDhV8aaXvksMrqXa3//kU5t4PaJfMOD9HVisCHqPOa/1F9BSe0H8zlRYNXbK0YAMi29/+gbHfh2p9ed3PzskUKGzqIloikGGwdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";

if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if ($arrJson['events'][0]['message']['text'] == "มีstickerไหม") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    // $arrPostData['messages'][0]['type'] = "text";
    // $arrPostData['messages'][0]['text'] = "ฉันส่งสติ้กเกอร์ไม่เป็นหน่ะ";
    $arrPostData['messages'][0]['type'] = "sticker";
    $arrPostData['messages'][0]['packageId'] = "1";
    $arrPostData['messages'][0]['stickerId'] = "1";
}else if ($arrJson['events'][0]['message']['text'] == "ส่งรูปมาหน่อย") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "image";
    $arrPostData['messages'][0]['originalContentUrl'] = "https://data.whicdn.com/images/165000912/large.jpg";
    $arrPostData['messages'][0]['previewImageUrl'] = "https://data.whicdn.com/images/165000912/large.jpg";
}else if ($arrJson['events'][0]['message']['text'] == "เป็นไง") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "image";
    $arrPostData['messages'][0]['originalContentUrl'] = "https://www.reactiongifs.com/r/csd.gif";
    $arrPostData['messages'][0]['previewImageUrl'] = "https://www.reactiongifs.com/r/csd.gif";
}else if ($arrJson['events'][0]['message']['text'] == "อยู่ไหน?") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "location";
    $arrPostData['messages'][0]['title'] = "my location";
    $arrPostData['messages'][0]['address'] = "〒150-0002 東京都渋谷区渋谷２丁目２１−１";
    $arrPostData['messages'][0]['latitude'] = 35.65910807942215;
    $arrPostData['messages'][0]['longitude'] = 139.70372892916203;
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
echo "OK";
?>
