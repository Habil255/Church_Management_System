<?php

namespace App\Models;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commitee extends Model
{
    use HasFactory;
    protected $table = 'commitees';
    protected $guarded=[];

    public function users()
    {
        # code...
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function projects()
    {
        # code...
        return $this->hasMany(Project::class);
    }
}
