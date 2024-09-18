<?php

namespace App\Providers;

use App\Events\Worker\CreatedEvent;
use App\Listeners\Worker\CreateProfileListener;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        Event::listen(
          CreatedEvent::class,
          CreateProfileListener::class
        );
    }
}
