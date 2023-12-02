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
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        // $this->app()->singleton("WebsocketClient", function ($app) {
        //     return new \RaheelRafiq326\Websocket\WebsocketClient();
        // });
    }

    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__.'../config/websocket.php' => config_path('websocket.php'),
            __DIR__.'../vendor' => public_path('vendor')
        ], "websocket");

        $this->publishes([
            __DIR__.'../config/websocket.php' => config_path('websocket.php')
        ], "websocket-config");
        
        $this->publishes([
            __DIR__.'../vendor' => public_path('vendor')
        ], "websocket-js");
    }
}
