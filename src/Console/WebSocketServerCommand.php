<?php

namespace RaheelRafiq326\Websocket\Console;

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Illuminate\Console\Command;
use Ratchet\WebSocket\WsServer;
use RaheelRafiq326\Websocket\Http\Controllers\WebSocketController;

class WebSocketServerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Websocket serve';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $port = env("WEB_SOCKET_PORT") ?? 8080;
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketController()
                )
            ),
            $port // Specify the port you want to run the WebSocket server on
        );

        $this->info('WebSocket server started on port '.$port);
        $server->run();
    }
}
