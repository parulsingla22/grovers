<?php

namespace App\Http\Controllers;

use App\checkout;
use App\carttotal;
use App\Menu;
use App\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
	public function cartcount()
	{
		$userId = auth()->user()->id;
		$quantcount=Cart::where([
				['userid', '=', $userId]
			])->sum('quantity');
		return $quantcount; 
	}
	public function carttotal(Request $request)
	{
			$menu = Menu::where('active',1)->get();
				$carttotal=array();
		$carttotal['userId'] = auth()->user()->id;
		$carttotal['subtotal']=$request->subtotal;
			$carttotal['delivery']=$request->delivery;
		$carttotal['discount']=$request->discount;
		$carttotal['total']=$request->total;
		$carttotal['cartcount1']=$this->cartcount();
		
		return view('checkout')->with(compact('carttotal','menu','cartcount1'));
   
		
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(checkout $checkout)
    {
        //
    }
}
