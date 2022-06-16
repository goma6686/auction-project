<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Bid;
use App\Models\Condition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $conditions = Condition::all();
        $bids = Bid::all();
        $items = DB::table('items')
            ->join('users', 'items.user_id', 'users.id')
            ->select('items.*', 'users.name', 'users.id')
            ->get();
        return view('admin.dashboard', ['items' => $items, 'conditions' => $conditions, 'bids' => $bids]);
    }

    public function users(Request $request){
        $data = User::withCount(['items'])->get();
        return view('admin.users', ['users' => $data]);
    }

    public function conditions(Request $request){
        $conditions = Condition::all();
        return view('admin.conditions', ['conditions' => $conditions]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string',
        ]);
        $condition = new Condition();
        $condition -> name = $request->input('name');
        $condition -> save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $condition = Condition::findOrFail($id);
        if($id != 1){
            Item::where('condition_id', $id)->update((['condition_id'=>'1']));
            $condition->delete();
        }
        return redirect()->back();
    }
}
