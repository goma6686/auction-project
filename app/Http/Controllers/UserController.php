<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Bid;
use App\Models\User;
use App\Models\Condition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function show(Request $request, $id){
        $conditions = Condition::all();
        $bids = Bid::all();
        $items = Item::where('user_id', Auth::id())->get();
        $user = User::findOrFail($id);
        return view('profile', ['user' => $user, 'items' => $items, 'conditions' => $conditions, 'bids' => $bids]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $conditions = Condition::all();
        $item = Item::find($id);
        return view('edit-user', ['user' => $user, 'conditions' => $conditions, 'item' => $item]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
