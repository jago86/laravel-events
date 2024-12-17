<?php

namespace App\Listeners;

use App\Events\SessionStarted;
use App\Mail\LoginNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginNotification implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(SessionStarted $event): void
    {
        // info("💪 Enviado notificación de inicio de sesión para el usuario: {$event->user->email}.");
        Mail::to($event->user)
            ->send(new LoginNotification($event->user, $event->request));
    }
}
