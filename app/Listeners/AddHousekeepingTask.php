<?php

namespace App\Listeners;

use App\Events\RoomCreated;
use App\Models\HousekeepingTask;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddHousekeepingTask
{
    public function handle(RoomCreated $event)
    {
        HousekeepingTask::create([
            'room_id' => $event->room->id,
            'task' => 'Clean Room',
            'status' => 'pending',
        ]);
    }
}
