<?php

namespace App\Models;
use App\Models\User;
use App\Models\EventSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $guarded=[];
    public function users()
    {
       
        return $this->belongsToMany(User::class)->withTimestamps();

    }

    public function schedules()
    {
        # code...
        return $this->hasMany(EventSchedule::class);
    }
}
