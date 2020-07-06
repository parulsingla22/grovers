<?php
 
namespace App\Traits;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


trait Cartcount {

    public function getCartcount() {
        // 
		$userId = auth()->user()->id;
		$quantcount=Cart::where([
				['userid', '=', $userId]
			])->sum('quantity');
		return $quantcount; 
		$this->middleware('auth');
	
    }
}
?>