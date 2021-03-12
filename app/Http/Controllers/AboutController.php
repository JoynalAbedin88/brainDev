<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\About;
use App\Models\Media;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        session(['area' => 3, 'page' => 5]);
        $about = About::all()->first();
        if($about){
            return redirect(route('about.edit', $about->id));
        }else{
            return view('backend.creteAbout', compact('about'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValid($request);
        $request->validate([
            'banner'    => 'required',
            'first_img' => 'required',
            'second_img'=> 'required',
        ]);
        $path = 'frontend/images/about/';
        About::create([
            'banner'    => Media::imgUpload($request->banner, $path, 1350, 380 ),
            'upper_img' => Media::imgUpload($request->first_img, $path, 324, 405 ),
            'lower_img' => Media::imgUpload($request->second_img, $path, 324, 405 ),
            'heading'   => $request->heading,
            'upper_pra' => $request->upper_pra,
            'lower_pra' => $request->lower_pra,
        ]);

        return back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        session(['area' => 3, 'page' => 5]);
        return view('backend.creteAbout', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $this->formValid($request);
        $path = 'frontend/images/about/';
        if($request->hasFile('banner')){
            if(file_exists($about->banner)){
                unlink($about->banner);
            }
            $about->update([
                'banner' => Media::imgUpload($request->banner, $path, 1350, 380 ),
            ]);
        }
        if($request->hasFile('first_img')){
            if(file_exists($about->upper_img)){
                unlink($about->upper_img);
            }
            $about->update([
                'upper_img' => Media::imgUpload($request->first_img, $path, 324, 405 ),
            ]);
        }
        if($request->hasFile('second_img')){
            if(file_exists($about->lower_img)){
                unlink($about->lower_img);
            }
            $about->update([
                'lower_img' => Media::imgUpload($request->second_img, $path, 324, 405 ),
            ]);
        }
        $about->update([
            'heading'   => $request->heading,
            'upper_pra' => $request->upper_pra,
            'lower_pra' => $request->lower_pra,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }

    private function formValid($request)
    {
        return $request->validate([
            'banner'        => 'image|mimes:jpg,jpeg,png,svg',
            'heading'       => 'required',
            'upper_pra'     => 'required',
            'lower_pra'     => 'required',
            'first_img'     => 'image|mimes:jpg,jpeg,png,svg',
            'second_img'    => 'image|mimes:jpg,jpeg,png,svg',
        ]);
     }
}
