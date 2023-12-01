<?php

namespace RaheelRafiq326\Websocket;

class WebSocketClient
{
    public static function sendMessage($channel, $event, $data, $url = null) {
        if (!$url) $url = env("WEB_SOCKET_HOST");
        if (!$url) throw new Error("WEB_SOCKET_HOST is not found");
        $client = new \WebSocket\Client($url);
        $message = json_encode([
            'channel' => $channel,
            "event" => $event,
            "data" => $data
        ]);
        $client->text($message);
        $client->close();
    }
}
