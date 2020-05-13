<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	public function cartcount()
	{
		$userId = auth()->user()->id;
		$quantcount=Cart::where([
				['userid', '=', $userId]
			])->sum('quantity');
		return $quantcount; 
	}
	public function checkout()
	{
		
	}
	public function add(Request $request){
        
		$product = Products::find($request->id);
		$userId = auth()->user()->id;
		$cart=Cart::where([
				['userid', '=', $userId],
				['productid', '=',$request->id]
			])->count();
		if($cart>0)
		{
			 $test = Cart::where([
					['productid',$request->id],
					['userid',$userId]
					])->first();
				$quant=$test->quantity;
				$quant=$quant+1;
				$test->quantity=$quant;
				$test->save();
				return back();
		}
		else
		{
			$quant=1;
			Cart::create(['userid'=>$userId,'productid'=>$request->id,'quantity'=>$quant]);
			return back();
		}
	}
	public function remove(Request $request)
	{
		
		$userId = auth()->user()->id;
        $test=Cart::where([
        ['productid',$request->id],
		['userid',$userId]
        ]);
		$test->delete($request->id);
		return back();
  
	}
	public function update(Request $request)
	{
		$userId = auth()->user()->id;
		$test=Cart::where([
					['productid',$request->id],
					['userid',$userId]
					])->first();
				$test->quantity=$request->quantity;
				$test->save();
			 return back();
	}

    public function cart(){
		
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
        return view('cart')->with(compact('menu','cart','cartcount1'));
    }

    public function clear(){
        $userId = auth()->user()->id;
        $test=Cart::find($userId);
		$test->delete($userId);

        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");;
    }
}