<?php

namespace App\Listeners;

use App\Events\SessionStarted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoginNotification
{
    /**
     * Handle the event.
     */
    public function handle(SessionStarted $event): void
    {
        //
    }
}
