<?php

namespace App\Http\Controllers;

use App\Wishlist;
use App\Menu;
use Illuminate\Support\Facades\DB;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
     public function __construct()
	{
		$this->middleware('auth');
	}
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$menu = Menu::where('active',1)->get();
				$userId = auth()->user()->id;
		$users=DB::table('wishlists')
			->join('products', 'products.id', '=', 'wishlists.product_id')
				->select('wishlists.*','products.*')->get();
        return view('wishlist')->with(compact('menu','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Products::find($request->pid);
		$userId = auth()->user()->id;
		$wish=Wishlist::where([
				['user_id', '=', $userId],
				['product_id', '=',$request->pid]
			])->count();

		if($wish!=0)
		{
			 return back();
		}
		else
		{
        Wishlist::create(['user_id'=>$userId,'product_id'=>$request->pid]);
       return back();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$userId = auth()->user()->id;
        $test=Wishlist::where([
        ['product_id',$id],
		['user_id',$userId]
        ]);
		$test->delete($id);
		return back();
		
    }
}
