<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
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
        $project = Project::latest('id')->where('category_id', '!=', 0)->get();
        $category = Category::where('what', 2)->orderBy('name', 'asc')->get();
        $completeProject = Project::latest('id')->where('category_id', 0)->get();
        return view('backend.createProject', compact('category', 'project', 'completeProject'));
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
            'image'    => 'required|mimes:jpg,jpeg,png',
        ]);
        $path  = 'storage/frontend/images/projects/';
        if($request->project){
            $request->validate([
                'Project_type'    => 'required',
            ]);
            $img = Media::imgUpload($request->image, $path, 440, 388);
            $value = decrypt($request->Project_type);
        }else{
            $img = Media::imgUpload($request->image, $path, 355, 600);
            $value = 0;
        }
        Project::create([
            'image' => $img,
            'category_id' => $value,
        ]);
        return back()->with('success', 'Project Upload Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'Project_type' => 'required',
            'image'    => 'mimes:jpg,jpeg,png',
        ]);
        $path  = 'storage/frontend/images/projects/';
        if($request->hasFile('image')){
            if(file_exists($project->image)){
                unlink($project->image);
            }
            $project->update([
                'image' => Media::imgUpload($request->image, $path, 440, 388),
            ]);
        }
        $project->update([
            'category_id' => decrypt($request->Project_type),
        ]);
        return back()->with('success', 'Project update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success' ,'complete Project delete Success');
    }
}
