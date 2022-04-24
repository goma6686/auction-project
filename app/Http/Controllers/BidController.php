<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Bid;
use Carbon\Carbon;

class BidController extends Controller
{
    public function updatePrice(Request $request, $id){
        $this->validate($request, [
            'bid_amount' => 'required|numeric'
        ]);
        
        $item = Item::findOrFail($id);
        $item -> price = request('bid_amount');
        $item -> bidder_count++;
        $item -> save();
        $bid = new Bid();
        $bid -> user_id = $request->user()->id;
        $bid -> item_id = $item -> id;
        $bid -> bid_amount = $item -> price;
        $bid -> created_at = \Carbon\Carbon::now()->toDateTimeString();
        $bid -> save();
        return redirect()->back();
        //return $item->toJson();
    }
}
