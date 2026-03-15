<?php

namespace ApiLens\Core;

class Tracker
{
    public function track(Event $event): void
    {
            $this->store($event);   
    }

    protected function store(Event $event): void
    {
        // Store the event in the database or send it to an external service
        file_put_contents(
            storage_path('logs/api-lens.log'),
            json_encode($event->toArray()) . PHP_EOL,
            FILE_APPEND
        );
    }
}