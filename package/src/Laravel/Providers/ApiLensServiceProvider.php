<?php

namespace ApiLens\Laravel\Providers;

use Illuminate\Routing\Router;

class ApiLensServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // Register any bindings or services here if needed
    }

    public function boot(): void
    {
        $this->app->booted(function () {
            $router = $this->app->make(Router::class);
            $router->pushMiddlewareToGroup('web', \ApiLens\Laravel\Middleware\TrackApiRequests::class);
        });
    }
}