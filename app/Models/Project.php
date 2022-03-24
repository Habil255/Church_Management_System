<?php

namespace App\Models;
use App\Models\Commitee;
use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function commitees()
    {
        # code...
        return $this->belongsTo(Commitee::class);
    }

    public function budgets()
    {
        # code...
        return $this->hasMany(Budget::class);
    }
}
