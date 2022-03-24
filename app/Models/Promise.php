<?php

namespace App\Models;
use App\Models\Contribution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function contributions()
    {
        # code...
        return $this->belongsTo(Contribution::class);
        
    }
}
