<?php

namespace RaheelRafiq326\Websocket;

use Illuminate\Support\ServiceProvider;

class WebsocketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->commands([
            Console\WebSocketServerCommand::class
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->app()->singleton("WebsocketClient", function ($app) {
        //     return new \RaheelRafiq326\Websocket\WebsocketClient();
        // });
    }
}
