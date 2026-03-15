<?php

namespace ApiLens\Laravel\Providers;

class ApiLensServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // Register any bindings or services here if needed
    }

    public function boot(): void
    {
        // Boot any services or perform any actions needed during the application's bootstrapping
        $this->app['router']->pushMiddlewareToGroup('web', \ApiLens\Laravel\Middleware\TrackApiRequests::class);
    }
}