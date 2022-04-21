<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'title', 
        'description',
        'min_bid',
        'end_date',
        'condition_id',
        'starting_price',
        'is_active',
    ];
}
