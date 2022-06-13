<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Bid;
use App\Models\Condition;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $items = Item::orderBy('created_at', 'desc')->get();
        $conditions = Condition::all();
        return view('dashboard', ['items' => $items, 'conditions' => $conditions]);
    }

    public function profile(){
        $data = User::all();
        $items = Item::all();
        $conditions = Condition::all();
        $bids = Bid::all();
        return view('profile', ['users' => $data, 'items' => $items, 'conditions' => $conditions, 'bids' => $bids]);
    }

    public function show($id)
    {
        $conditions = Condition::all();
        $item = Item::find($id);
        $bids = Bid::where('item_id', $item->id)->get();
        return view('show-post', ['item' => $item, 'conditions' => $conditions, 'bids' => $bids] );
    }

}
