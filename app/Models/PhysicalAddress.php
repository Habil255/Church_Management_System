<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalAddress extends Model
{
    use HasFactory;

    protected $guarded= [];
    protected $fillable = ['user_id','district','ward','street','house_number','block_number'];
    public function users()
    {
        # code...
        return $this->belongsTo(User::class);
        
    }
}
