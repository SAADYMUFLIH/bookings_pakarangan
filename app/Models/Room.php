<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HousekeepingTask;

class Room extends Model
{
    protected $fillable = ['number'];

    protected static function booted()
    {
        static::created(function ($room) {
            // Periksa jika entri sudah ada sebelum membuat yang baru
            if (HousekeepingTask::where('room_id', $room->id)->doesntExist()) {
                HousekeepingTask::create([
                    'room_id' => $room->id,
                    'status' => 'dirty',
                ]);
            }
        });
    }

    public function housekeepingTasks()
    {
        return $this->hasMany(HousekeepingTask::class);
    }

    public function latestHousekeepingTaskStatus()
    {
        return $this->housekeepingTasks()->latest('updated_at')->value('status');
    }

 
}
