<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$data = Categories::Paginate(5);
		return view ( 'admin.category.listing' )->withData ( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.category.create');
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
			'name' => 'required|min:2',
			'active'=>'required',
			'photo' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
		$fileName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('images/category/'), $fileName);
		$filepath='images/category/'.$fileName;
		$result=Categories::create(['img'=>$fileName,'name' => $request->name,'active' => $request->active]);
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
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $test = Categories::find($id);
        return view('admin.category.edit')->with(compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $request->validate([
			'name' => 'required|min:2',
			'active'=>'required'
		]);
		
		$test = Categories::find($id);
		$test->name = request('name');
		$test->active = request('active');
		$nimage = request('newphoto');
    if($request->hasFile('newphoto'))
    {
        $oldImage = public_path("images/category/{$test->img}"); // get previous image from folder
         // unlink or remove previous image from folder
            unlink($oldImage);
        
		$request->validate([
			'newphoto' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
        $file = $request->newphoto;
        $name = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(('images/category/'), $name);
        $test->img= $name;
    }
		$test->save();
		return view('admin.category.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Categories::find($id);
		unlink(public_path("images/category/{$test->img}"));
		$test->delete($id);
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
	public function __construct()
	{
		$this->middleware('auth');
	}
}
