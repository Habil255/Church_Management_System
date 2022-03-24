<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sacrament extends Model
{
    use HasFactory;
    protected $table = 'sacraments';
    protected $guarded= [];
    public function users()
    {
        # code...
        return $this->belongsToMany(User::class)->withTimestamps();
        
    }
}
