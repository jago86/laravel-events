<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogLoggedInUserInfo
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        info("Usando el evento nativo de Laravel", [
            'user' => $event->user,
            'guard' => $event->guard,
            'remember' => $event->remember,
        ]);
    }
}
