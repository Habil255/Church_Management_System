<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'category',
        'picture',
        'bought_by',
        'date',
        'buyer_number',
        'price',
        'receipt_number',
        'receipt_picture',
    ];
    protected $guided = [];
    protected $table = 'resources';
}
