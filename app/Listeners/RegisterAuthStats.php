<?php

namespace App\Listeners;

use App\Events\SessionStarted;

class RegisterAuthStats
{
    public function handle(SessionStarted $event)
    {
        info("Registrando estadísticas de inicio de sesión para el usuario: {$event->user->name}.");
    }
}
