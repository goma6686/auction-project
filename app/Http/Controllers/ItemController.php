<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function show(){
        //$items = DB::table('items')->get();
        //return view('dashboard', ['items'=>$items]);

        $items = Item::all();
        return view('dashboard', ['items' => $items]);
    }

    public function itemTest(){
        $items = Item::all();
        return view('test', ['items' => $items]);
    }
}
