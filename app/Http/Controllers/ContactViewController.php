<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactViewController extends Controller
{
    public function create()
	{
	
				$menu=Menu::where('active',1)->get();
				return view('contact')->with(compact('menu'));
			
		
	}
}
