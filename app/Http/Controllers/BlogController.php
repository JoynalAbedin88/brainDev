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
    public function index()
    {
        $blog = Blog::latest('id')->get();
        session(['area' => 2, 'page' => 1]);
        return view('backend.blog.index', compact('blog')); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['area' => 2, 'page' => 2]);
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
        $path = 'frontend/images/blogs/';
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
    public function show()
    {
        
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
        $path = 'frontend/images/blogs/';
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
        session(['area' => 2, 'page' => 3]);
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
