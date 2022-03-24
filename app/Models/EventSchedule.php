<?php

namespace App\Models;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSchedule extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function events()
    {
        # code...
        return $this->belongsTo(Event::class);
    }
}
