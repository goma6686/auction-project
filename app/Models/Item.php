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
        'price',
        'condition_id',
        'starting_price',
        'bidder_count',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function condition()
    {
        return $this->hasOne(Condition::class);
    }

    public function winner(){
        return $this->hasOne(Winner::class);
    }
}
