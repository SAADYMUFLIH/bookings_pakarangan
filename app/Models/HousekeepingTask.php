<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingTask extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'housekeeping_employee_id', 'status'];

    // Relasi Many-to-One dengan HousekeepingEmployee
    public function employee()
    {
        return $this->belongsTo(HousekeepingEmployee::class, 'housekeeping_employee_id');
    }

    // Relasi Many-to-One dengan Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}

