# Websocket

## Documentation, Installation, and Usage Instructions

<!-- See the [documentation](https://spatie.be/docs/laravel-permission/) for detailed installation and usage instructions. -->

## Introduction
This package allows you to add socket server within a package.

Install library in laravel project.

```terminal
composer require raheelrafiq326/websocket
```

## Documentation

### Installation
Publish config and js files in project.

```terminal
php artisan vendor:publish --tag=websocket
```

```terminal
php artisan websocket:serve
```

After installation add below command in schedule function in app\Console\Kernel.php (if want to add websocket server from cronjob).

```php
protected function schedule(Schedule $schedule): void
{
    // call this command to be schedule
    $schedule->command('websocket:serve')->withoutOverlapping();
}
```

After this run scheduler (in development or local).
```terminal
php artisan schedule:run
```

Add above command in cron job in server (production).

### Usage
you can use below code to broadcast event from controller or any other class.

```php
use RaheelRafiq326\Websocket\WebSocketClient;

// Change value with your channel name.
$channel = "<Channel Name>";

// Change value with your event name.
$event = "<Event Name>";

// Chnage value according to your requirement.
$data = [
  "message" => "Hi"
];

// Call sendMessage function of WebSocketClient from package.
WebSocketClient::sendMessage($channel, $event, $data);

```

### Testing
Run below command if you didn't publish js files.
```terminal
php artisan vendor:publish --tag=websocket-js
```

You can test websocket connection using socket.js. Which was exported to public/vendor/websocket directory.
```html
<script src="{{ asset('vendor/websocket/socket.js') }}"></script>
<script>
    // connect websocket
    const socket = new Socket("{{ config('websocket.host') }}")

    // check if socket connect successfully
    socket.onopen((event) => {
      console.log("onopen event ==> ", event)
    })

    // listen events
    socket.listen({
        channel: "<Channel Name>",
        event: "<Event Name>",
        callback: (event) => {
            console.log("event listen ==> ", event)
        }
    })
</script>
```



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.