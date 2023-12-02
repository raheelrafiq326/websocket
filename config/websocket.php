<?php

return [
  // host url for websocket connection
  'host' => env("WEB_SOCKET_HOST", "ws://localhost:8080"),
  
  // port for websocket server
  'port' => env("WEB_SOCKET_PORT", 8080)
];