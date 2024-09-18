<?php

namespace App\Listeners\Worker;

//use App\Events\CreatedEvent;
use App\Events\Worker\CreatedEvent;
use App\Models\Profile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateProfileListener
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
    public function handle(CreatedEvent $event): void
    {
        Profile::create([
            'worker_id' => $event->worker->id,
        ]);
    }
}
