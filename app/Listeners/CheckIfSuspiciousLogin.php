<?php

namespace App\Listeners;

use App\Events\SessionStarted;
use App\Events\SuspiciousLoginDetected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckIfSuspiciousLogin
{
    /**
     * Handle the event.
     */
    public function handle(SessionStarted $event): void
    {
        info("Verificando si el inicio de sesión es sospechoso para el usuario: {$event->user->name}.");

        //
        //
        //
        if (true) {
            SuspiciousLoginDetected::dispatch($event->user, $event->request);
            // Enviar notificación de sospecha al usuario
            // Enviar SMS de sospecha al usuario
            // Enviar notificación de sospecha al administrador
            //
            //
            //
            //
        }
    }
}
