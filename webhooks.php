<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'bK9JGXo5u4sFzy0dT0G/nHoCWCex4eevXxRxaP8YkvlJZiOUIYdlRqk2PBBV6U/9dZP3mQd1Vy7E38DpT0NcnkvV6Fdo3x0LytmLq0DvbExVJAS0PIm2PQGX2IuCRmd53jmcPUCqwE9J2Qi0Q1kyZgdB04t89/1O/w1cDnyilFU=';

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
			
			
			$my_file = 'message.txt';
			$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
			$data = 'This is the data';
			fwrite($handle, $data);
			
			
						

			$text = 'ท่านพิมพ์มาว่า ' . $text ;
				
			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
				
			
					  
					  

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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

			echo $result . "\r\n";
					
			
		}
		
				
		
		
		
	}
}
echo "OK";

echo  $text ;

