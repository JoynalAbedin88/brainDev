<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChooseUs;
use App\Models\Media;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $choose = ChooseUs::all();
        $category = Category::where('what', 2)->orderBy('name', 'asc')->get();
        return view('backend.createService', compact('category', 'choose'));
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
            "name" => 'required',
            "price" => 'required',
            "type" =>  'required',
            "icon" => 'required|image|mimes:jpg,jpeg,png',
            "desc" => 'required',
        ]);
        if($request->special){
            $value = 1;
        }else{
            $value = 0;
        }
        $path = 'storage/frontend/images/icons/';
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'icon' => Media::imgUpload($request->icon, $path, 45, 45),
            'description' => $request->desc,
            'special'   => $value,
            'category_id' => decrypt($request->type),
        ]);
        return back()->with('success', 'Service Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $category = Category::where('what', 2)->orderBy('name', 'asc')->get();
        return view('backend.editService', compact('category', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            "name" => 'required',
            "price" => 'required',
            "type" =>  'required',
            "desc" => 'required',
            "icon" => 'image|mimes:jpg,jpeg,png',
        ]);
        if($request->special){
            $value = 1;
        }else{
            $value = 0;
        }
        $path = 'storage/frontend/images/icons/';
        if($request->hasFile('icon')){
            if(file_exists($service->icon)){
                unlink($service->icon);
            }
            $service->update([
                'icon' => Media::imgUpload($request->icon, $path, 45, 45),
            ]);
        }
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->desc,
            'special'   => $value,
            'category_id' => decrypt($request->type),
        ]);
        return back()->with('success', 'Service Add Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
