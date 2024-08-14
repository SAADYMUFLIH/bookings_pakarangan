<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingEmployee extends Model
{
    protected $fillable = [
        'name'
    ];

    // Relasi One-to-Many dengan HousekeepingTask
    public function tasks()
    {
        return $this->hasMany(HousekeepingTask::class, 'employee_id');
    }
}
