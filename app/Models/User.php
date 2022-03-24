<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Occupation;
use App\Models\ContactAddress;
use App\Models\PhysicalAddress;
use App\Models\HouseToHouseWorship;
use App\Models\Contribution;
use App\Models\Event;
use App\Models\Sacrament;
use App\Models\Commitee;
use App\Models\Dependency;
use App\Models\Neighbour;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */
    protected $touches =['roles'];
    protected $guarded= [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        # code...
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function occupations()
    {
        # code...
        return $this->hasMany(Occupation::class);
    }

    public function contactAddresses()
    {
        # code...
        return $this->hasMany(ContactAddress::class);
        
    }

    public function physicalAddresses()
    {
        # code...
        return $this->hasOne(PhysicalAddress::class);
        
    }

    public function dependecies()
    {
        # code...
        return $this->hasMany(Dependency::class);
        
    }

    public function houseToHouseWorships()
    {
        # code...
        return $this->belongsTo(HouseToHouseWorship::class);
        
    }

    public function committees()
    {
        # code...
        return $this->belongsToMany(Commitee::class)->withTimestamps();
    }
    
    public function contributions()
    {
        # code...
        return $this->hasMany(Contribution::class);
    }

    public function sacraments()
    {
        # code...
        return $this->belongsToMany(Sacrament::class)->withTimestamps();
    }

    public function events()
    {
        # code...
        return $this->belongsToMany(Event::class)->withTimestamps();
    }

    public function neighbours()
    {
        # code...
        return $this->hasMany(Neighbour::class);
    }
}
