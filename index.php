<?php

require_once__DIR__ . '/vendor/autoload.php';

$httpClient = new \LINE\LINEBot\httpClient\CurlHTTPClient(getenv
('CHANNEL_ACCESS_TOKEN'));

$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv
('CHANNEL_SECRET')]);

$signature = $_SERVER['HTTP_' . \LINE\LINEBot\constant\HTTPHeader
::LINE_SIGNATURE];

$events = $bot->parseEventRequest(file_get_contents('php://input'),
$signature);

foreach ($events as $event) {
  //テキストを送信
  $bot->replyText($event->getReplyToken(), 'TextMessage');
}

?>
