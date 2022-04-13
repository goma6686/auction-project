<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    //use SoftDeletes;
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'title', 
        'description',
        'min_bid',
        'end_date',
        'condition_id',
        'is_active',
    ];
}
