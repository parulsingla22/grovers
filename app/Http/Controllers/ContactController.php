<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
     public function __construct()
	{
		//$user=User::all();
		//echo $user;
		$res=$this->middleware('auth');
		

		
		
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
				$data = Contact::Paginate(5);
				return view ( 'admin.contact.listing' )->withData ( $data );
			}
		}
	}
	
	 public function store(Request $request)
    {
		 if (Auth::check())
		{	
			if( auth()->user()->type != 'USER')
			{
				return redirect('/');
			}	
			else
			{
				$request->validate([
					'cname' => 'required|min:2',
					'cemailid' => 'required',
					'csubject'=>'required',
					'cmessage'=>'required',
				]);
				$result=Contact::create(['name' => $request->cname,'emailid' => $request->cemailid,'subject'=>$request->csubject,'message' => $request->cmessage]);
				
				if ($result) {
					return response()->json([
						'status'=>'success']);
				} else {
					return response()->json([
						'status' => 'error']);
				}
			}
		}
    }
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
				$test=Contact::find($id);
				$test->delete($id);
				return response()->json([
					'success' => 'Record deleted successfully!'
				]);
			}
		}
    }

}
