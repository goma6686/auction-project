<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Bid;
use Carbon\Carbon;
use Auth;
use App\Events\NewBid;

class BidController extends Controller
{

    public function index(Item $item, $id){
        
        $item = Item::find($id);
        $bids = Bid::where('item_id', $item->id)->get();
        //return response()->json($item->bids()->with('user')->get());
        return response()->json($bids);
    }

    public function actOnBid(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Place bid':
                Item::where('id', $id)->increment('bidder_count');
                break;
        }
        event(new NewBid($id, $action));
        return '';
    }


    public function updatePrice(Request $request, $id){
        /*$item = Item::findOrFail($id);
        $this->validate($request, [
            'bid_amount' => 'required|numeric'
        ]);
        $bid = $item->bids()->create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'bid_amount' => $request->bid_amount,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        $bid = Bid::where('id', $bid->id)->with('user')->first();

        $maxBid = $item->bid()->max('bid_amount');

        if(!$maxBid){
            $maxBid = $item->starting_price;
        }

        $item->price = $bid_amount;
        $item -> bidder_count++;
        $item -> save();

        return $bid->toJson();
        */
        $item = Item::findOrFail($id);
        $bid_amount = $request->bid_amount;
        $item_id = $item -> id;
        $user_id = Auth::id();

        $maxBid = $item->bids()->max('bid_amount');

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

            //event(new NewBid($bid));

            return redirect()->back();
        }
    }
}
