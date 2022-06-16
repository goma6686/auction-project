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
        $user = User::findOrFail($id);
        $items = Item::where('user_id', $user->id)->get();
        $count = $items->where('is_active', '=', 1)->count();
        return view('profile', ['user' => $user, 'items' => $items, 'conditions' => $conditions, 'bids' => $bids, 'count' => $count]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $conditions = Condition::all();
        $item = Item::find($id);
        return view('admin.edit-user', ['user' => $user, 'conditions' => $conditions, 'item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'mimes:jpg,png,jpeg,svg|image|max:5120',
        ]);

        $user -> name = request('name');
        $user -> email = request('email');

        if(request('is_active') != NULL){
            $user->is_active = '1';
        } else {
            $user->is_active = '0';
        }

        if(request('is_admin') != NULL){
            $user->is_admin = '1';
        } else {
            $user->is_admin = '0';
        }

        if($request->avatar != ''){
            if($user->avatar != null && $user->avatar != ''){
                $old = public_path().'/images/avatars/'.$user->avatar;
                unlink($old);
            }
            $file = $request->file('avatar');
            $filename = time().'_'.$file->getClientOriginalName();
            $user -> avatar = $filename;
   
            // File upload location
            $location = public_path('/images/avatars/');
   
            // Upload file
            $file->move($location,$filename);
        }
        $user->save();

        return redirect()->back();
    }

    public function removeAvatar($id){
        $user = User::findOrFail($id);
        unlink(public_path('/images/avatars/'.$user->avatar));
        $user -> avatar = null;
        $user -> save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Item::where('user_id', $user->id)->delete();
        Bid::where('user_id', $user->id)->delete();
        $user->delete();
        return redirect()->back();
    }
}
