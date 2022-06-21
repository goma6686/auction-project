<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Bid;
use App\Models\Winner;
use Illuminate\Support\Facades\DB;
use App\Events\BidPlaced;
use Carbon\Carbon;

class BidController extends Controller
{
    public function updatePrice(Request $request, $id){

        $this->validate($request, [
            'bid_amount' => 'required|numeric'
        ]);

        $item = Item::findOrFail($id);

        //find max current bid
        $max_bid = $item->bids()->max('bid_amount');
        if(!$max_bid){
            $max_bid = $item->price;
        }

        //check if user's submitted bid amount is bigger
        if(request('bid_amount') > $max_bid){
            $item->price = request('bid_amount'); //if it is, set new price
        }

        $item -> bidder_count++;

        $item -> save();

        //update Bid table
        $bid = new Bid();
        $bid -> user_id = $request->user()->id;
        $bid -> item_id = $item -> id;
        $bid -> bid_amount = $item -> price;
        $bid -> created_at = \Carbon\Carbon::now()->toDateTimeString();
        $bid -> save();

        event(new BidPlaced($item));
        return redirect()->back();
    }

    public function findWinner($item_id){
        
        $item = Item::findOrFail($item_id);
        $win = DB::table('bids')
            ->join('users', 'bids.user_id', 'users.id')
            ->where('bids.item_id', $item->id)
            ->select('users.id as user_id', 'item_id', 'bids.bid_amount as final_amount')
            ->orderBy('bid_amount', 'desc')
            ->first();

        $winner = new Winner();
        $winner -> user_id = $win->user_id;
        $winner -> item_id = $win->item_id;
        $winner -> final_amount = $win->final_amount;
        $winner -> created_at = \Carbon\Carbon::now()->toDateTimeString();
        $winner -> save();
        
        return redirect()->back();
    }
}
