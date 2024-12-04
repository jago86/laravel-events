<?php

namespace App\Listeners;

use App\Events\SessionStarted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoginNotification implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(SessionStarted $event): void
    {
        info("💪 Enviado notificación de inicio de sesión para el usuario: {$event->user->email}.");
    }
}
