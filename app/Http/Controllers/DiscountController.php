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
		$data = Discount::Paginate(5);
		return view ( 'admin.discounts.listing' )->withData ( $data );
    
    }
	public function cartcount()
	{
		$userId = auth()->user()->id;
		$quantcount=Cart::where([
				['userid', '=', $userId]
			])->sum('quantity');
		return $quantcount; 
	}
	public function coupon(Request $request)
	{
		
		$coupon=Discount::where('promocode',$request->code)->first();
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
		//echo $coupon;
        return view('cart')->with(compact('menu','cart','cartcount1','coupon'));
   
		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discounts.create');
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
		 $request->validate([
			'title' => 'required',
			'amount'=>'required',
			'pactive'=>'required'	
		]);
		$result=Discount::create(['promocode' => $request->title,'discount'=>$request->amount,'active'=>$request->pactive]);
		if ($result) {
			return response()->json([
				'status'=>'success']);
		} else {
			return response()->json([
				'status' => 'error']);
		}
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
    public function edit($discount)
    {
        //
		$test = Discount::find($discount);
        return view('admin.discounts.edit')->with(compact('test'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$discount)
    {
        //
		$request->validate([
			'title' => 'required',
			'amount'=>'required',
			'pactive'=>'required'
		]);
		
		$test = Discount::find($discount);
		$test->promocode = request('title');
		$test->discount = request('amount');
		$test->active = request('pactive');
		
		$test->save();
		
		return view('admin.discounts.create');
    
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
		
        $test=Discount::find($discount);
		$test->delete($id);
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
