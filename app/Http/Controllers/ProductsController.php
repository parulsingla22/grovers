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

class ProductsController extends Controller
{
	use CartCount;
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
		$users = DB::table('products')
            ->join('categories', 'products.categoryid', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')
            ->paginate(4);
		if (Auth::check())
		{	
			if( auth()->user()->type != 'ADMIN')
			{
				return redirect('/');
			}	
		else
		{
			return view('admin.products.listing', ['data' => $users]);
		}
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check())
		{	
			if( auth()->user()->type != 'ADMIN')
			{
				return redirect('/');
			}	
			else
			{
				$category=Categories::where('active',1)->get();
				return view('admin.products.create')->with(compact('category'));
			}
		}
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$request->validate([
			'name' => 'required',
			'price'=>'required',
			'pactive'=>'required',
			'category'=>'required',
			'productimg' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
		$fileName = time().'.'.$request->productimg->extension();  
        $request->productimg->move(public_path('images/products/'), $fileName);
		$filepath='images/products/'.$fileName;
		$result=Products::create(['productimg'=>$fileName,'name' => $request->name,'price'=>$request->price,'saleprice'=>$request->saleprice,'active' => $request->pactive,'categoryid'=>$request->category]);
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
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check())
		{	
			if( auth()->user()->type != 'ADMIN')
			{
				return redirect('/');
			}	
			else
			{
				$category=Categories::where('active',1)->get();
				$test = Products::find($id);
				return view('admin.products.edit')->with(compact('test','category'));
			}
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
		$request->validate([
			'name' => 'required',
			'price'=>'required',
			'pactive'=>'required'
		]);
		
		$test = Products::find($id);
		$test->name = request('name');
		$test->price = request('price');
		$test->saleprice = request('saleprice');
		$test->active = request('pactive');
		$nimage = request('newphoto');
    if($request->hasFile('newphoto'))
    {
        $oldImage = public_path("images/products/{$test->productimg}"); // get previous image from folder
         // unlink or remove previous image from folder
            unlink($oldImage);
        
		$request->validate([
			'newphoto' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
        $file = $request->newphoto;
        $name = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(('images/products/'), $name);
        $test->icon= $name;
    }
		$test->save();
		
		$category=Categories::where('active',1)->get();
		return view('admin.products.create')->with(compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if (Auth::check())
		{	
			if( auth()->user()->type != 'ADMIN')
			{
				return redirect('/');
			}	
			else
			{
				$test=Products::find($id);
				unlink(public_path("images/products/{$test->productimg}"));
				$test->delete($id);
				return response()->json([
					'success' => 'Record deleted successfully!'
				]);
			}
		}
    }
	public function shop()
	{
		
		$products = DB::table('products')
            ->join('categories', 'products.categoryid', '=', 'categories.id')
            ->select('products.*', 'categories.name as category')->get();
		$menu = Menu::where('active',1)->get();
		$userId = auth()->user()->id;
		//$products=Products::where('active',1)->get();
		$category=Categories::where('active',1)->get();
		$cartcount1=$this->getCartcount();
		return view('shop')->with(compact('menu','users','category','products','cartcount1'));
	}
	public function detail(Request $request)
	{
		$menu = Menu::where('active',1)->get();
		$userId = auth()->user()->id;
		$products=Products::where('id',$request->pid)->get();
		$category=Categories::where('active',1)->get();
		$cartcount1=$this->getCartcount();
		return view('product-single')->with(compact('menu','users','category','products','cartcount1'));
	
	}
}
