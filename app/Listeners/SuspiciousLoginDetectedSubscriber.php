<?php

namespace App\Listeners;

use Illuminate\Events\Dispatcher;
use App\Events\SuspiciousLoginDetected;

class SuspiciousLoginDetectedSubscriber
{

    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            SuspiciousLoginDetected::class,
            [SuspendUserAccount::class, 'handleSuspendUserAccount'],
        );
        $events->listen(
            SuspiciousLoginDetected::class,
            [SuspendUserAccount::class, 'handleSendEmailNotification'],
        );

        return [
            SuspiciousLoginDetected::class => 'handleSendEmailAlertToUser',
            SuspiciousLoginDetected::class => 'handleSendSMSAlertToUser',
            SuspiciousLoginDetected::class => 'handleSendEmailAlertAdmin',
        ];
    }

    public function handleSendEmailAlertToUser(SuspiciousLoginDetected $event)
    {
        info("💪 Enviado notificación de sospecha para el usuario: {$event->user->email}.");
    }

    public function handleSendSMSAlertToUser(SuspiciousLoginDetected $event)
    {
        info("💪 Enviado SMS de sospecha para el usuario: {$event->user->name}.");
    }

    public function handleSendEmailAlertAdmin(SuspiciousLoginDetected $event)
    {
        info("💪 Enviado notificación de sospecha para el administrador del sistema.");
    }
}
