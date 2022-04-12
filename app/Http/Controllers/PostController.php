<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;
use App\Models\Condition;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = User::all();
        $conditions = Condition::all();
        return view('profile', ['users' => $data, 'items' => DB::table('items')->orderBy('id', 'desc')->paginate(5), 'conditions' => $conditions]);
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
            'cover' => 'mimes:jpg,png,jpeg,svg|image',
        ]);
        $item = new Item();
        $item -> title = $request->input('title');
        $item -> description = $request->input('description');
        $item -> min_bid = $request->input('min_bid') ?? '1.0';
        $item -> end_date = $request->input('end_date');
        $item -> condition_id = $request->input('condition_id');
        if($request-> has('is_active')){
            $item -> is_active = '1';
        } else {
            $item -> is_active = '0';
        }

        if($request->file('cover')){
            $file = $request->file('cover');
            $filename = time().'_'.$file->getClientOriginalName();
            $item -> cover = $filename;
   
            // File upload location
            $location = public_path('/images');
   
            // Upload file
            $file->move($location,$filename);
        }

        $item -> user_id = $request->user()->id; 
        $item -> save();
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
        $conditions = Condition::all();
        $item = Item::find($id);
        return view('edit-post', ['conditions' => $conditions, 'item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $item = Item::findOrFail($id);

        $item -> title = request('title');
        $item -> description = request('description');
        $item -> min_bid = request('min_bid');
        $item -> end_date = request('end_date');
        $item -> condition_id = request('condition_id');
        if(request('is_active') != NULL){
            $item->is_active = '1';
        } else {
            $item->is_active = '0';
        }
        $item->save();

        return redirect('/profile');
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
        if($items -> cover != null){
            unlink(public_path('/images/'.$items->cover));
        }
        $items->delete();
        return redirect('/profile');
    }
}
