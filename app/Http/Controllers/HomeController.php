<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends CartController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$count=$this->cartcount();
		//echo $count;
        return view('home')->with(compact('count'));
    }
}
