<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Media;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['area' => 3, 'page' => 10]);
        $banner = banner::where('what', 0)->get();
        return view('backend.banners', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['area' => 4, 'page' => 11]);
        $banner = banner::latest('id')->where('what', 1)->get();
        return view('backend.slider', compact('banner'));
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
            'image' => "required|image|mimes:jpg,jpeg,png",
            'heading' => 'required',
        ]);
        $path = 'frontend/images/banner/';
        if($request->slider){
            $what = 1;
        }else{
            $what = 0;
        }

        banner::create([
            'heading' => $request->heading,
            'short' => $request->short,
            'what' => $what,
            'image' => Media::imgUpload($request->image, $path, '', ''),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(banner $banner)
    {
        if($banner->home == 0){
            $banner->update(['status' => 1]);
        }else{
            $banner->update(['status' => 0]);
        }
    return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, banner $banner)
    {
        $request->validate([
            'image' => "image|mimes:jpg,jpeg,png",
            'heading' => 'required',
        ]);
        $path = 'frontend/images/banner/';
        if($request->hasFile('image')){
            if(file_exists($banner->image)){
                unlink($banner->image);
            }
            $banner->update([
                'image' => Media::imgUpload($request->image, $path, '', ''),
            ]);
        }
        $banner->update([
            'heading' => $request->heading,
            'short' => $request->short,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(banner $banner)
    {
        if(file_exists($banner->image)){
            unlink($banner->image);
        }
        $banner->delete();
        return back();
    }
}
