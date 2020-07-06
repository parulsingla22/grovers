<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Menu;
use App\Categories;
use Illuminate\Support\Facades\DB;
use App\Traits\CartCount;

class BlogViewController extends Controller
{
	
	use CartCount;
    public function display()
	{
		//$this->middleware('auth');
		$category=DB::table('categories')
       ->join('blog', 'blog.category', '=','categories.id')
       ->select(DB::raw('count(blog.category) as countcat,categories.name'))
	   ->groupBy('categories.name')
	   ->get();
     
		$menu = Menu::where('active',1)->get();
		$blogs = Blog::where('active',1)->get();
				//$userId = auth()->user()->id;
			//$cartcount1=$this->getCartcount();
		return view('blog')->with(compact('menu','blogs','category'));
	}
	public function singleblog($id)
	{
		$singleblog=Blog::where('id',$id)->get();
		return view('blog-single')->with(compact('singleblog'));
	}
}
