<?php

namespace App\Http\Controllers;

use App\Cart;
use App\orders;
use App\payments;
use Illuminate\Support\Facades\DB;
use App\Products;
use App\Menu;
use App\Categories;
use App\orderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 var $id1;
		
	 public function __construct()
	{
		$this->middleware('auth');
		
	}
    public function index()
    {
        $orders=$this->show();
		
			$menu = Menu::where('active',1)->get();
		$userId = auth()->user()->id;
		//echo $userId;
		$category=Categories::where('active',1)->get();
		return view('orders')->with(compact('menu','users','category','orders','userId')); 
		
			
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function placeorder(Request $request)
	 {
			$latestOrder = orders::orderBy('created_at','DESC')->first();
			$orderId = '#'.str_pad($latestOrder->id + 1,4, "0", STR_PAD_LEFT);
		 
		 $userId = auth()->user()->id;
		 payments::create(['orderId'=>$orderId,'amount'=>$request->subtotal,'discount'=>$request->discount,'delivery'=>$request->delivery,'total'=>$request->total]);
			
			 $test = payments::where([
					['orderId',$orderId]
					])->first();
			$payid=$test->PaymentId;
			orders::create(['orderId'=>$orderId,'userId'=>$userId,'name'=>$request->fname,'address'=>$request->address,'contact'=>$request->contact,'paymentId'=>$payid]);
			$cart=Cart::where([
				['userid', '=', $userId]
			])->get();
			foreach ($cart as $item) 
			{
				orderItems::create(['orderId'=>$orderId,'pid'=>$item->productid,'quantity'=>$item->quantity]);
				Cart::find($item->id)->delete($item->id);
			}
			$orders=$this->show();
			$menu = Menu::where('active',1)->get();
		$userId = auth()->user()->id;
		$category=Categories::where('active',1)->get();
		
		//return to view after success
		return view('orders')->with(compact('menu','users','category','orders','userId')); 
		
			}
			
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
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
	public function details()
	{
		
		if (Auth::check())
		{	
			if( auth()->user()->type != 'ADMIN')
			{
				return redirect('/');
			}	
			else
			{
				$orders = DB::table('orders')
				->join('payments', 'orders.paymentId', '=', 'payments.PaymentId')
				->join('order_items', 'order_items.orderId', '=', 'payments.orderId')
				->join('products', 'order_items.pid', '=', 'products.id')
				->select('orders.*','payments.*','order_items.*')->paginate(5);
				//echo $orders;
				return view('admin.orders.listing')->with(compact('orders'));
			}
		}
	}
    public function show()
    {
			
		   
			$orders = DB::table('orders')
            ->join('payments', 'orders.paymentId', '=', 'payments.PaymentId')
            ->select('orders.*','payments.*')
			->get();
		/*	$menu = Menu::where('active',1)->get();
		$userId = auth()->user()->id;
		//$products=Products::where('active',1)->get();
		$category=Categories::where('active',1)->get();
		view('orders')->with(compact('menu','users','category','orders')); */
		return $orders;
			
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(orders $orders)
    {
        //
    }
}
