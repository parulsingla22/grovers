<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
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
        if (Auth::check())
		{	
			if( auth()->user()->type != 'ADMIN')
			{
				return redirect('/');
			}	
			else
			{
				$data = Menu::Paginate(5);
				return view ( 'admin.menu.listing' )->withData ( $data );
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
				$menu=Menu::where('active',1)->get();
				return view('admin.menu.create')->with(compact('menu'));
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
			'title' => 'required|min:2',
			'refer' => 'required',
			'category'=>'required',
			'active'=>'required',
		]);
		$result=Menu::create(['item' => $request->title,'menuid' => $request->category,'ref'=>$request->refer,'active' => $request->active]);
		
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
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $menu = Menu::find($id);
		$cat=Menu::where('active',1)->get();
        return view('admin.menu.edit')->with(compact('menu','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
        $menu = Menu::find($id);
        $menu->item = request('title');
        $menu->ref = request('refer');
		$menu->menuid = request('category');
        $menu->active = request('active');       
        $menu->save(); 
		return redirect()->action('DashboardController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
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
				Menu:find($id)->delete($id);
				return response()->json([
					'success' => 'Record deleted successfully!'
				]);
			}
		}
    }
	
}
