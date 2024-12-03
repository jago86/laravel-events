<?php

namespace App\Listeners;

use App\Events\SuspiciousLoginDetected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SuspendUserAccount
{
    /**
     * Handle the event.
     */
    public function handleSuspendUserAccount(SuspiciousLoginDetected $event): void
    {
        info("💪 Suspendiendo la cuenta del usuario: {$event->user->name}.");
    }

    public function handleSendEmailNotification(SuspiciousLoginDetected $event): void
    {
        info("💪 Enviado email de notificacion de cuentaa suspenda: {$event->user->name}.");
    }
}
