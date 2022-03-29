<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{
    use HasFactory;
    protected $guarded= [];
    protected $fillable = ['user_id','phonenumber','postal_address'];
    public function users()
    {
        # code...
        return $this->belongsTo(User::class);
        
    }

}
