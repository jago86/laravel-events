<?php

namespace App\Listeners;

use App\Events\SuspiciousLoginDetected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckIfSuspendUserAccount implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(SuspiciousLoginDetected $event): void
    {
        // Determinar si el usuario debe ser suspendido
        if (true) {
            info("💪 Suspendiendo la cuenta del usuario: {$event->user->name}.");
            info("💪 Enviado email de notificacion de cuentaa suspenda: {$event->user->name}.");
        }
    }
}
