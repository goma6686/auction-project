<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $items = Item::all();
        $data = User::all();
        return view('post', ['items' => $items]);
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->condition = $request->condition;
        $item->save();
        return redirect('/');
    }
}
