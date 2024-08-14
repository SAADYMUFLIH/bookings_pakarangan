<?php

namespace App\Providers;

use App\Events\RoomCreated;
use Illuminate\Support\Facades\Event;
use App\Listeners\AddHousekeepingTask;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        RoomCreated::class => [
            AddHousekeepingTask::class,
        ],
    ];
    
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
