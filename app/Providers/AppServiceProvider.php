<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Event::listen(Login::class, function (Login $event) {
        //     info("Usando el evento nativo de Laravel", [
        //         'user' => $event->user,
        //         'guard' => $event->guard,
        //         'remember' => $event->remember,
        //     ]);
        // });
    }
}
