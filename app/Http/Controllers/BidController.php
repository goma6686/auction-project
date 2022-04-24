<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Bid;
use Carbon\Carbon;
use Auth;

class BidController extends Controller
{
    public function updatePrice(Request $request, $id){
        $this->validate($request, [
            'bid_amount' => 'required|numeric'
        ]);
        $item = Item::findOrFail($id);
        $bid_amount = $request->bid_amount;
        $item_id = $item -> id;
        $user_id = Auth::id();

        $maxBid = $item->bid()->max('bid_amount');

        if(!$maxBid){
            $maxBid = $item->starting_price;
        }

        if($bid_amount < $item->min_bid + $item->price){
            $msg = `Can't bid lower than ` + ($item->min_bid + $item->price);
            return response()->json($msg);
        } else {
            $bid = new Bid();
            $bid->user_id = $user_id;
            $bid->item_id = $item_id;
            $bid->bid_amount = $bid_amount;
            $bid -> created_at = \Carbon\Carbon::now()->toDateTimeString();
            $bid -> save();
            $item->price = $bid_amount;
            $item -> bidder_count++;
            $item -> save();
            return redirect()->back();
        }
        /*
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
        //return $item->toJson();*/
    }
}
