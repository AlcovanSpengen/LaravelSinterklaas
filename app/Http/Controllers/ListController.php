<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Auth;
use Session;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() 
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
      $user = Auth::user();
      $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
      return view('lists.index', compact('user', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//Validating title and body field
      $this->validate($request, array(
        //   'user_id'=>'required',
          'title' => 'required|max:100',
          'product1' =>'required|max:100',
          'product2' =>'required|max:100',
          'product3' =>'required|max:100',
          'product4' =>'required|max:100',
          'product5' =>'required|max:100'
        ));

      $wishlist = new Wishlist;
      
      $wishlist->title = $request->title;
      $wishlist->product1 = $request->product1;
      $wishlist->product2 = $request->product2;
      $wishlist->product3 = $request->product3;
      $wishlist->product4 = $request->product4;
      $wishlist->product5 = $request->product5;
      $wishlist->user_id = auth()->id();


      $wishlist->save();

      Session::flash('Success', 'Your wishlist was successfully submitted!');

      return redirect()->route('lists.show', $wishlist->id);
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
      $wishlist = Wishlist::findOrFail($id);
      $wishlist->delete();

      return redirect()->route('lists.index')
          ->with('flash_message',
           'Item successfully deleted');
    }
}
