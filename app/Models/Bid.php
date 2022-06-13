<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'bid_amount',
        'item_id',
        'user_id',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'foreign_key');
    }

    public function largestBid()
    {
        return $this->hasOne(User::class)->ofMany('bid_amount', 'max');
    }
}
