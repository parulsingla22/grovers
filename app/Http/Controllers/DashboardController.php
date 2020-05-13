<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
			return view('admin.layouts.master');
		
    }
	public function __construct()
	{
		$this->middleware('auth');
	}
	protected function redirectTo($request)
	{
		return route('login');
	}
}