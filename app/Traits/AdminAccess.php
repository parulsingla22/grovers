<?php
 
namespace App\Traits;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;



trait AdminAccess {


    use AuthenticatesUsers;
   public function getUserType()
	{
		$this->middleware('auth');
		if (Auth::check())
		{	
			if( auth()->user()->type != 'ADMIN')
			{
				return redirect('/');
			}	
			else
			{
				echo auth()->user()->type;
			}
		}
	
	}
}
?>