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
}else if($arrJson['events'][0]['message']['text'] == "-web"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][1]['type'] = "text";
  $arrPostData['messages'][1]['text'] = "https://www.futurepark.co.th/th/home/";
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ท่านสามารถค้นหารายละเอียดต่างๆได้ที่เว็บไชต์";
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
    $arrPostData['messages'][1]['type'] = "text";
    $arrPostData['messages'][1]['text'] = "เป็นไง สวยละสิ!";
}else if ($arrJson['events'][0]['message']['text'] == "เป็นไง") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "image";
    $arrPostData['messages'][0]['originalContentUrl'] = "https://www.reactiongifs.com/r/csd.gif";
    $arrPostData['messages'][0]['previewImageUrl'] = "https://www.reactiongifs.com/r/csd.gif";
}else if ($arrJson['events'][0]['message']['text'] == "-location") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "location";
    $arrPostData['messages'][0]['title'] = "ฟิวเจอร์พาร์ค รังสิต";
    $arrPostData['messages'][0]['address'] = "Future Park Rangsit";
    $arrPostData['messages'][0]['latitude'] = 13.988698000000012;
    $arrPostData['messages'][0]['longitude'] = 100.61764199999993;
}else if ($arrJson['events'][0]['message']['text'] == "-help") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "คุณสามารถพิพม์คำสั่งดังต่อไปนี้ \n -events เพื่อค้นหาevents\n -floors แสดงแผนที่ชั้น \n -location แสดงที่ตั้ง \n -web แสดงเว็บไซต์ \n ความช่วยเหลืออื่นๆ กรุณาติดต่อ 02-0000000";
}else if ($arrJson['events'][0]['message']['text'] == "-events") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "image";
    $arrPostData['messages'][0]['originalContentUrl'] = "https://www.futurepark.co.th/ckfinder/userfiles/images/event/AW%20POSTER%20%5BConverted%5D.jpg";
    $arrPostData['messages'][0]['previewImageUrl'] = "https://www.futurepark.co.th/ckfinder/userfiles/images/event/AW%20POSTER%20%5BConverted%5D.jpg";
    $arrPostData['messages'][1]['type'] = "image";
    $arrPostData['messages'][1]['originalContentUrl'] = "https://www.futurepark.co.th/ckfinder/userfiles/images/event/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%88%E0%B8%B2%E0%B8%81%E0%B9%80%E0%B8%A5%E0%B8%B7%E0%B8%AD%E0%B8%94.png";
    $arrPostData['messages'][1]['previewImageUrl'] = "https://www.futurepark.co.th/ckfinder/userfiles/images/event/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%88%E0%B8%B2%E0%B8%81%E0%B9%80%E0%B8%A5%E0%B8%B7%E0%B8%AD%E0%B8%94.png";
    $arrPostData['messages'][2]['type'] = "image";
    $arrPostData['messages'][2]['originalContentUrl'] = "https://www.futurepark.co.th/stocks/event/pic_20170911112918_th.jpg";
    $arrPostData['messages'][2]['previewImageUrl'] = "https://www.futurepark.co.th/stocks/event/pic_20170911112918_th.jpg";
    $arrPostData['messages'][3]['type'] = "text";
    $arrPostData['messages'][3]['text'] = "แล้วมาเจอกันนะคะ ^^";

}else if ($arrJson['events'][0]['message']['text'] == "-floors") {
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "image";
    $arrPostData['messages'][0]['originalContentUrl'] = "https://www.futurepark.co.th/stocks/floor_plan/FloorB.png";
    $arrPostData['messages'][0]['previewImageUrl'] = "https://www.futurepark.co.th/stocks/floor_plan/FloorB.png";
    $arrPostData['messages'][1]['type'] = "image";
    $arrPostData['messages'][1]['originalContentUrl'] = "https://www.futurepark.co.th/stocks/floor_plan/FloorG.png";
    $arrPostData['messages'][1]['previewImageUrl'] = "https://www.futurepark.co.th/stocks/floor_plan/FloorG.png";
    $arrPostData['messages'][2]['type'] = "image";
    $arrPostData['messages'][2]['originalContentUrl'] = "https://www.futurepark.co.th/stocks/floor_plan/Floor1.png";
    $arrPostData['messages'][2]['previewImageUrl'] = "https://www.futurepark.co.th/stocks/floor_plan/Floor1.png";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "อยากทราบข้อมูลต่างๆ ลองพิพม์ -help ดูสิ";
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
