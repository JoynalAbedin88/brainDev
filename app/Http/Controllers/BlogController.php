<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = '')
    {
        $searchKey = $_GET['search'] ?? Null;
        $query = Blog::latest('id');

        if($id != Null){
            $blog = $query->where('category_id', decrypt($id))->get();
        }elseif($searchKey){
            $blog = $query->where('title', 'like', "%{$searchKey}%")->get();
        }
        else{
            $blog = $query->get();
        }

        $category = Category::orderBy('name', 'asc')->where('what', 1)->get();
        return view('frontend.blog', compact('blog', 'category', 'query'));
    }

    // Method for  back end 
    public function allPost()
    {
        $blog = Blog::latest('id')->get();
        return view('backend.blog.index', compact('blog')); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'asc')->where('what', 1)->get();
        return view('backend.blog.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->formValid($request);
        $request->validate(['file' => 'required']);
        $path = 'storage/frontend/images/blogs/';
        Blog::create([
            'title'         => $request->title, 
            'slug'          => $request->slug,
            'category_id'   => decrypt($request->type),
            'image'         => Media::imgUpload($request->file, $path, 730, 400 ),
            'user_id'       => Auth::id(), 
            'video'         => $request->video,   
            'content'       => $request->content
        ]);
        return back()->with('success', 'Post uploade success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $save = null;
        if(Auth::user()){
            if(Auth::user()->comment->last()){
                $save = Auth::user()->comment->last();
            }
        }

        $blog = Blog::where('slug', $slug)->where('id', decrypt($id))->first();
        $category = Category::orderBy('name', 'asc')->where('what', 1)->get();
        $recent = Blog::latest('id');

        return view('frontend.singleBlog', compact('blog', 'category', 'recent', 'save'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $category = Category::orderBy('name', 'asc')->where('what', 1)->get();
        return view('backend.blog.edit', compact('blog', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $this->formValid($request);
        $path = 'storage/frontend/images/blogs/';
        $image = $blog->image;
        if($request->hasFile('file')){
           if(file_exists($blog->image)){
            unlink($blog->image);
           }
           $image =  Media::imgUpload($request->file, $path, 730, 400 );
        }
        $blog->update([
            'title'         => $request->title, 
            'slug'          => $request->slug,
            'category_id'   => decrypt($request->type),
            'image'         => $image,
            'user_id'       => Auth::id(), 
            'video'         => $request->video,    
            'content'       => $request->content
        ]);
        return back()->with('success', 'Post Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'post delete Success');
    }
    // This Method For  Trust Page  show
    public function trush()
    {
        $blog = Blog::onlyTrashed()->latest('id')->get();
        return view('backend.blog.trush', compact('blog'));
    }
    // This Method For Restore
    public function restore($id)
    {
        Blog::onlyTrashed()->where('id', $id)->first()->restore();
        return back()->with('success', 'Post Restore Success');
    }

    // This Method For Force Delete
    public function forceDelete($id)
    {
        $blog = Blog::onlyTrashed()->where('id', $id)->first();
        if(file_exists($blog->image)){
            unlink($blog->image);
        }
        $blog->forceDelete();
        return back()->with('success', 'Post Restore Success');
    }

    private function formValid($request)
    {
        return $request->validate([
            'title'     => 'required|string',
            'slug'      => 'required|string',
            'type'      => 'required',
            'file'      => 'image|mimes:jpg,jpeg,png,gif,svg',
            'content'   => 'required',
            'video'     => 'nullable',
        ]);
    }

}
