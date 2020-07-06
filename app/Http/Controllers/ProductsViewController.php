<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Products;
use App\Menu;
use App\Categories;
use App\Cart;
use App\Traits\CartCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProductsViewController extends Controller
{
	use CartCount;
    
	public function shop()
	{
		
		$products = DB::table('products')
            ->join('categories', 'products.categoryid', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')->get();
		$menu = Menu::where('active',1)->get();
		//$userId = auth()->user()->id;
		//$products=Products::where('active',1)->get();
		$category=Categories::where('active',1)->get();
		if (Auth::check()) {
    // The user is logged in...
		$cartcount1=$this->getCartcount();
		}
		else
		{
			$cartcount1=0;
		}
		return view('shop')->with(compact('menu','users','category','products','cartcount1'));
	}
	public function detail(Request $request)
	{
		$menu = Menu::where('active',1)->get();
		//$userId = auth()->user()->id;
		$products=Products::where('id',$request->pid)->get();
		$category=Categories::where('active',1)->get();
			if (Auth::check()) {
    // The user is logged in...
		$cartcount1=$this->getCartcount();
		
		}
		else
		{
			$cartcount1=0;
		}
		//$cartcount1=$this->getCartcount();
		return view('product-single')->with(compact('menu','users','category','products','cartcount1'));
	
	}
}
