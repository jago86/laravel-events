<?php

namespace App\Listeners;

use App\Events\SessionStarted;
use App\Events\SessionDestroyed;

class RegisterAuthStats
{
    public function handle(SessionStarted|SessionDestroyed $event)
    {
        info("Registrando estadísticas de autenticación para el usuario: {$event->user->name}.");
    }
}
