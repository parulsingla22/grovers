<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Menu;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
    {
        //
    }
	public function coupon(Request $request)
	{
		
		$coupon=Discount::where('promocode',$request->code)->get();
		$menu = Menu::where('active',1)->get();
        $params = [
            'title' => 'Shopping Cart Checkout',
        ];
		
		$userId = auth()->user()->id;
		$cartcount1=$this->cartcount();
		//echo $userId;
		$cart=DB::table('cart')
			->join('products', 'products.id', '=', 'cart.productid')
				->select('cart.*','products.*')
				->where(['cart.userid'=>$userId])
				->get();
		//echo $cart;
        return view('cart')->with(compact('menu','cart','cartcount1','coupon'));
   
		
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
