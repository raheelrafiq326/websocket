<?php

namespace RaheelRafiq326\Websocket;

class WebSocketClient
{
    public static function sendMessage($channel, $event, $data, $url = null) {

        if (is_null(config('websocket'))) {
            throw new \Error("Please publish the config file by running 'php artisan vendor:publish --tag=websocket-config'");
        }

        $client = new \WebSocket\Client(config('websocket.host'));
        $message = json_encode([
            'channel' => $channel,
            "event" => $event,
            "data" => $data
        ]);
        $client->text($message);
        $client->close();
    }
}
