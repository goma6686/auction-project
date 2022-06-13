<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Bid;
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
        $pusher = new \Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        $pusher->trigger('Bids', 'BidPlaced', $item);
        return redirect()->back();
    }
}
