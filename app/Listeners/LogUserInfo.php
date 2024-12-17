<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\CreatingUser;
use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogUserInfo
{
    /**
     * Handle the event.
     */
    public function handle(CreatingUser|UserCreated $event): void
    {
        if ($event instanceof CreatingUser) {
            info("Estás a punto de crear un usuario", $event->user->toArray());
        }

        if ($event instanceof UserCreated) {
            info("Se acaba de crear un usuario", $event->user->toArray());
        }

        info("Número de usuarios:", [User::count()]);
    }
}
