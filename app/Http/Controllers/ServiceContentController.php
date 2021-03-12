<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServiceContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['area' => 3, 'page' => 7]);
        $category = Category::where('what', 2)->orderby('name', 'asc')->get();
        return view('backend.serviceContent', compact('category'));
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
            "cetregory" => 'required',
            "serviceCon" => 'required',
            "serviceImg" => 'required|image|mimes:jpg,jpeg,png',
            "discussion" => 'required',
            "discussion_img_1" => 'required|image|mimes:jpg,jpeg,png',
            "discussion_img_2" =>'required|image|mimes:jpg,jpeg,png',
        ]);
        $path = 'frontend/images/service/';
        ServiceContent::create([
            'banner' => null,
            'discussion_img_1' => Media::imgUpload($request->discussion_img_1, $path, 324, 405),
            'discussion_img_2' => Media::imgUpload($request->discussion_img_2, $path, 324, 405),
            'service_img' => Media::imgUpload($request->serviceImg, $path, '', ''),
            'discussion' => $request->discussion,
            'serviceCon' => $request->serviceCon,
            'category_id' => decrypt($request->cetregory),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceContent  $serviceContent
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceContent $serviceContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceContent  $serviceContent
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceContent $serviceContent)
    {
        $category = Category::where('what', 2)->orderby('name', 'asc')->get();
        return view('backend.editServiceContent', compact('serviceContent', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceContent  $serviceContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceContent $serviceContent)
    {
        $request->validate([
            "cetregory" => 'required',
            "serviceCon" => 'required',
            "serviceImg" => 'image|mimes:jpg,jpeg,png',
            "discussion" => 'required',
            "discussion_img_1" => 'image|mimes:jpg,jpeg,png',
            "discussion_img_2" =>'image|mimes:jpg,jpeg,png',
        ]);

        $path = 'frontend/images/service/';
        if($request->hasFile('serviceImg')){
            if(file_exists($serviceContent->service_img)){
                unlink($serviceContent->service_img);
            }
            $serviceContent->update([
                'service_img' => Media::imgUpload($request->serviceImg, $path, '', ''),
            ]);
        }
        if($request->hasFile('discussion_img_2')){
            if(file_exists($serviceContent->discussion_img_2)){
                unlink($serviceContent->discussion_img_2);
            }
            $serviceContent->update([
                'discussion_img_2' => Media::imgUpload($request->discussion_img_2, $path, 324, 405),
            ]);
        }
        if($request->hasFile('discussion_img_1')){
            if(file_exists($serviceContent->discussion_img_1)){
                unlink($serviceContent->discussion_img_1);
            }
            $serviceContent->update([
                'discussion_img_1' => Media::imgUpload($request->discussion_img_1, $path, 324, 405),
            ]);
        }
        $serviceContent->update([
            'discussion' => $request->discussion,
            'serviceCon' => $request->serviceCon,
            'category_id' => decrypt($request->cetregory),
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceContent  $serviceContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceContent $serviceContent)
    {
        //
    }
}
