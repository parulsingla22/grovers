<?php

namespace App\Http\Controllers;

use App\Features;
use Illuminate\Http\Request;

class FeaturesController extends Controller
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
        
		$data = Features::Paginate(5);
		return view ( 'admin.features.listing' )->withData ( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.features.create');
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
			'title' => 'required',
			'description'=>'required',
			'factive'=>'required',
			'icon'=>'required'
		]);
		$result=Features::create(['icon'=>$request->icon,'title' => $request->title,'description'=>$request->description,'active' => $request->factive]);
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
     * @param  \App\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function show(Features $features)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $test = Features::find($id);
        return view('admin.features.edit')->with(compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
		 
		 $request->validate([
			'title' => 'required',
			'description'=>'required',
			'icon'=>'required',
			'factive'=>'required'
		]);
		
		$test = Features::find($id);
		$test->title = request('title');
		$test->description=request('description');
		$test->icon=request('icon');
		$test->active = request('factive');
	
		$test->save();
		return view('admin.features.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Features  $features
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Features::find($id);
		$test->delete($id);
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
