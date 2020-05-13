<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Menu;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
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
        
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Categories::where('active',1)->get();
        return view('admin.blog.create')->with(compact('category'));

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
			'title' => 'required',
			'datepicker'=>'required',
			'activeon'=>'required',
			'category'=>'required',
			'selecttag'=>'required',
			'editordata'=>'required',
			'blogphoto' => 'required|mimes:png,jpg,jpeg|max:2048'
		]);
		$fileName = time().'.'.$request->blogphoto->extension();  
        $request->blogphoto->move(public_path('images/blog/'), $fileName);
		$filepath='images/blog/'.$fileName;
		$result=Blog::create(['photo'=>$fileName,'title' =>$request->title,'body'=>$request->editordata,'category'=>$request->category,'tags'=>$request->selecttag,'active' => $request->activeon,'publishedOn'=>$request->datepicker]);
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
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }
	public function display()
	{
		$category=DB::table('categories')
       ->join('blog', 'blog.category', '=','categories.id')
       ->select(DB::raw('count(blog.category) as countcat,categories.name'))
	   ->groupBy('categories.name')
	   ->get();
     
		$menu = Menu::where('active',1)->get();
		$blogs = Blog::where('active',1)->get();
				$userId = auth()->user()->id;
		return view('blog')->with(compact('menu','users','blogs','category'));
	}
	public function singleblog($id)
	{
		$singleblog=Blog::where('id',$id)->get();
		return view('blog-single')->with(compact('singleblog'));
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
