<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Condition;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = User::all();
        $items = Item::all();
        $conditions = Condition::all();
        return view('profile', ['users' => $data, 'items' => $items, 'conditions' => $conditions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditions = Condition::all();
        $items = Item::all();
        return view('create-post', ['conditions' => $conditions, 'items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'condition_id' => 'required',
            'end_date' => 'required|date|after:today',
        ]);
        $item = new Item();
        $item -> title = $request->input('title');
        $item -> description = $request->input('description');
        $item -> min_bid = $request->input('min_bid') ?? '1.0';
        $item -> end_date = $request->input('end_date');
        $item-> condition_id = $request->input('condition_id');
        if($request->has('is_active')){
            $item->is_active = '1';
        } else {
            $item->is_active = '0';
        }
        $item-> user_id = $request->user()->id; 
        $item->save();
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();
        return redirect('/profile');
    }
}
