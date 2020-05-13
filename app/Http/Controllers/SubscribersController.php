<?php

namespace App\Http\Controllers;

use App\Subscribers;
use Illuminate\Http\Request;

class SubscribersController extends Controller
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
        
		$data = Subscribers::Paginate(5);
		return view ( 'admin.subscribers.listing' )->withData ( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
			'subscribe' => 'required|min:2',
		]);
		$result=Subscribers::create(['emailid' => $request->subscribe]);
		
		if ($result) {
			return response()->json([
				'status'=>'success']);
		} else {
			return response()->json([
				'status'=>'error']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribers $subscribers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribers $subscribers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribers $subscribers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribers  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $test=Subscribers::find($id);
		$test->delete($id);
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
