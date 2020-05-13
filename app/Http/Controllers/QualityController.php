<?php

namespace App\Http\Controllers;

use App\Quality;
use Illuminate\Http\Request;

class QualityController extends Controller
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
        
		$data = Quality::Paginate(5);
		return view ( 'quality.listing' )->withData ( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quality.create');
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
			'description'=>'required'
			'icon' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
		$fileName = time().'.'.$request->icon->extension();  
        $request->icon->move(public_path('images/quality/'), $fileName);
		$filepath='images/quality/'.$fileName;
		$result=Quality::create(['icon'=>$fileName,'title' => $request->title,'desc'=>$request->description,'active' => $request->active]);
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
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function show(Quality $quality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $test = Quality::find($id);
        return view('quality.edit')->with(compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
		 $request->validate([
			'title' => 'required',
			'description'=>'required'
		]);
		
		$test = Quality::find($id);
		$test->title = request('title');
		$test->desc = request('description');
		$test->active = request('active');
		$nimage = request('newphoto');
    if($request->hasFile('newphoto'))
    {
        $oldImage = public_path("images/quality/{$test->icon}"); // get previous image from folder
         // unlink or remove previous image from folder
            unlink($oldImage);
        
		$request->validate([
			'newphoto' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
        $file = $request->newphoto;
        $name = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(('images/quality/'), $name);
        $test->icon= $name;
    }
		$test->save();
		return view('admin.quality.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quality  $quality
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $test=Quality::find($id);
		unlink(public_path("images/quality/{$test->icon}"));
		$test->delete($id);
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
