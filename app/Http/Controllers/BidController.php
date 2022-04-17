<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Bid;
use Carbon\Carbon;

class BidController extends Controller
{
    public function updateBidAmount(Request $request, $id)
    {
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        $bid = Bid::findOrFail($id);
        $bid -> item_id = $request->item()->id;
        $bid -> user_id = $request->user()->id;
        $bid -> bid_amount = $request->('price');
        $bid -> updated_at = $current_date_time;
        $item -> save();
        return redirect()->back();
    }
}
