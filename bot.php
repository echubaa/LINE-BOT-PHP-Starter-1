<?php
$access_token = 'sIJ4G+8/3gh0q2ISi9WI1CGB8QwU57IzK+2N+Ni16/zzF6rHBTwOryDhV8aaXvksMrqXa3//kU5t4PaJfMOD9HVisCHqPOa/1F9BSe0H8zlRYNXbK0YAMi29/+gbHfh2p9ed3PzskUKGzqIloikGGwdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			$messages2 = [
				'type' => 'text',
				'text' => "มีอะไรให้ช่วยไหม"
			];
			$mes3 = "ทดสอบ";
			$messages3 = [
				'type' => 'text',
				// if ($text == "chuty"){
				// 	$mes3 = "chuty น่ารักมากๆ";
				// }else{
				// 	$mes3 = "นี่ไม่ใช่ chuty นี่นา";
				// }
				'text' => $mes3
			];
			$messageimage [
				'type' => 'image',
				'originalContentUrl'=> "https://img.buzzfeed.com/buzzfeed-static/static/2015-10/3/12/campaign_images/webdr05/pumpernickel-the-mini-pig-will-give-you-life-2-13650-1443890523-0_dblbig.jpg",
				'previewImageUrl': "https://img.buzzfeed.com/buzzfeed-static/static/2015-10/3/12/campaign_images/webdr05/pumpernickel-the-mini-pig-will-give-you-life-2-13650-1443890523-0_dblbig.jpg"
			]
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages,$messages2,$messages3,$messageimage],
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

			echo $result . "\r\n";
		}
	}
}
echo "OK";
