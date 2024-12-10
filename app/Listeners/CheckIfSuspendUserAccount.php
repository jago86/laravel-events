<?php

namespace App\Listeners;

use Illuminate\Bus\Batch;
use App\Jobs\SuspendUserAccount;
use Illuminate\Support\Facades\Bus;
use App\Events\SuspiciousLoginDetected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendSuspendedUserAccountNotification;

class CheckIfSuspendUserAccount
{
    /**
     * Handle the event.
     */
    public function handle(SuspiciousLoginDetected $event): void
    {
        // Determinar si el usuario debe ser suspendido
        if (true) {
            //Batch
            // Bus::batch([
            //     new SuspendUserAccount($event->user),
            //     new SendSuspendedUserAccountNotification($event->user),
            // ])->before(function (Batch $batch) {
            //     info("⚙️ Before batch...");
            // })->progress(function (Batch $batch) {
            //     info("⚙️ Progress batch...", $batch->toArray());
            // })->then(function (Batch $batch) {
            //     info("⚙️ Todos los jobs tuvieron éxito...");
            // })->catch(function (Batch $batch, \Throwable $e) {
            //     info("⚙️ Un job falló en el batch...");
            // })->finally(function (Batch $batch) {
            //     info("⚙️ Todos los jobs se intentaron procesar, no se si todos tuvieron éxito o no...");
            // })->dispatch();

            // Chain
            // Bus::chain([
            //     new SuspendUserAccount($event->user),
            //     new SendSuspendedUserAccountNotification($event->user),
            // ])->dispatch();

            SuspendUserAccount::dispatch($event->user);
            SendSuspendedUserAccountNotification::dispatch($event->user);
        }
    }
}
