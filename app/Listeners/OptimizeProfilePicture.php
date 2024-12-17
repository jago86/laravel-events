<?php

namespace App\Listeners;

use App\Jobs\OptimizePicture;
use App\Events\ProfilePictureUploaded;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OptimizeProfilePicture
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProfilePictureUploaded $event): void
    {
        OptimizePicture::dispatch(Storage::disk('public')->path($event->user->picture));
    }
}
