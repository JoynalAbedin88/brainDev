<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('name', 'asc')->where('what', 1)->get();
        return view('backend.blog.category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string',
            'short' => 'nullable',
            'icon'  => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        if($request->service){  // If Service True
            $what = 2; 
        }else{
            $what = 1;
        }
        $path = 'storage/frontend/images/icons/';
        if($request->hasFile('icon')){
            $icon = Media::imgUpload($request->icon, $path, 60, 60);
        }else{
            $icon = Null;
        }
        Category::create([
            'name' => $request->name,
            'what' => $what,
            'pragraph' => $request->short,
            'icon' => $icon,
            'status' => $request->status,
        ]);
        return back()->with('success', 'Category Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        $request->validate([
            'name' => 'required|string',
        ]);
        $path = 'storage/frontend/images/icons/';
        if($request->hasFile('icon')){
            if(file_exists($category->icon)){
                unlink($category->icon);
            }
            $icon = Media::imgUpload($request->icon, $path, 60, 60);
        }else{
            
                $icon = $category->icon;
            
        }
        $category->update([
            'name' => $request->name,
            'pragraph' => $request->short,
            'icon' => $icon,
            'status' => $request->status,
        ]);
        return back()->with('success', 'Category Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
