<?php

namespace App\Listeners;

use App\Events\SessionStarted;
use App\Events\SessionDestroyed;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterAuthStats implements ShouldQueue
{
    public function handle(SessionStarted|SessionDestroyed $event)
    {
        info("💪 Registrando estadísticas de autenticación para el usuario: {$event->user->name}.");
    }
}
