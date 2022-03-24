<?php

namespace App\Models;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    public function projects()
    {
        # code...
        return $this->belongsTo(Project::class)->withTimestamps();
    }
}
