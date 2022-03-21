<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use DB;

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
