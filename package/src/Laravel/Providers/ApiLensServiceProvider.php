<?php

namespace ApiLens\Laravel\Providers;

use ApiLens\Core\Tracker;
use ApiLens\Core\Transport\LogTransport;
use ApiLens\Core\Transport\TransportInterface;
use Illuminate\Routing\Router;

class ApiLensServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // Register any bindings or services here if needed
        $this->app->singleton(TransportInterface::class, function () {
            // You can choose which transport to use here (e.g., LogTransport, DatabaseTransport)
            return new LogTransport();
        });

        $this->app->singleton(Tracker::class, function ($app) {
            return new Tracker($app->make(TransportInterface::class));
        });
    }

    public function boot(): void
    {
        $this->app->booted(function () {
            $router = $this->app->make(Router::class);
            $router->pushMiddlewareToGroup('web', \ApiLens\Laravel\Middleware\TrackApiRequests::class);
        });
    }
}