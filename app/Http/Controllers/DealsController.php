<?php

namespace App\Http\Controllers;

use App\Deals;
use Illuminate\Http\Request;

class DealsController extends Controller
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
        
		$data = Deals::Paginate(5);
		return view ( 'admin.deals.listing' )->withData ( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$products=Products::where('active',1)->get();
        return view('admin.deals.create')->with(compact('products'));
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
			'product' => 'required',
			'sdate'=>'required',
			'edate'=>'required',
			'active'=>'required'
		]);
		$result=Deals::create(['productid' => $request->product,'sdate'->$request->sdate,'edate'->$request->edate,'active' => $request->active]);
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
     * @param  \App\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function show(Deals $deals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $test = Deals::find($id);
		$products=Products::where('active',1)->get();
        return view('admin.deals.edit')->with(compact('test','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
		 
		 $request->validate([
			'feature' => 'required',
			'active'=>'required'
		]);
		
		$test = Deals::find($id);
		$nimage = request('newphoto');
    if($request->hasFile('newphoto'))
    {
        $oldImage = public_path("images/Deals/{$test->icon}"); // get previous image from folder
         // unlink or remove previous image from folder
            unlink($oldImage);
        
		$request->validate([
			'newphoto' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
        $file = $request->newphoto;
        $name = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(('images/Deals/'), $name);
        $test->icon= $name;
    }
		$test->save();
		return view('admin.deals.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deals  $deals
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Deals::find($id);
		$test->delete($id);
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
