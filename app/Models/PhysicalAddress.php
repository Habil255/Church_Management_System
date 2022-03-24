<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalAddress extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function users()
    {
        # code...
        return $this->belongsTo(User::class);
        
    }
}
