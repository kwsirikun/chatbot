<?php



require "vendor/autoload.php";

$access_token = 'olWikdGKVYVpqxavhzLngTswO+ca6LlsO/tSRt/Y679Y9bKxESL6cCLfMtP8/UqOdZP3mQd1Vy7E38DpT0NcnkvV6Fdo3x0LytmLq0DvbEzsZs8W3Gtz2Jxj2m6p6YLAKpo01ZXf/3TFhrqMq0lqkwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'f526d009053f11b700c26ab2cbfc949f';

$pushID = 'U4fc288ad0ee120b1251d7a319f55a2be';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







