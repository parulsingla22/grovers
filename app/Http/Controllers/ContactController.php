<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Contact;
class ContactController extends Controller
{
     public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
    {
		
        $data = Contact::Paginate(5);
		return view ( 'admin.contact.listing' )->withData ( $data );
    }
	public function create()
	{
		$menu=Menu::where('active',1)->get();
		return view('contact')->with(compact('menu'));
	}
	 public function store(Request $request)
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
	  public function destroy($id)
    {
        $test=Contact::find($id);
		$test->delete($id);
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }

}
