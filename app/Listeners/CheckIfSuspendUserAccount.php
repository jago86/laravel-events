<?php

namespace App\Listeners;

use App\Jobs\SuspendUserAccount;
use App\Events\SuspiciousLoginDetected;
use App\Jobs\SendSuspendedUserAccountNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckIfSuspendUserAccount
{
    /**
     * Handle the event.
     */
    public function handle(SuspiciousLoginDetected $event): void
    {
        // Determinar si el usuario debe ser suspendido
        if (true) {
            SuspendUserAccount::dispatch($event->user);
            SendSuspendedUserAccountNotification::dispatch($event->user);
        }
    }
}
