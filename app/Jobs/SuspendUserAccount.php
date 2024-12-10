<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Batchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuspendUserAccount implements ShouldQueue
{
    use Batchable, Queueable;

    public $tries = 3;

    public $backoff = 1;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 3/0;
        info("💪✅ Suspendiendo la cuenta del usuario: {$this->user->name}.");
    }
}
