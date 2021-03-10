<?php

namespace App\Http\Controllers;

use App\Models\ChooseUs;
use App\Models\Media;
use Illuminate\Http\Request;

class ChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'title' => 'required',
            'icon'  => 'required|image|mimes:jpg,jpeg,png',
            'content' => 'required'
        ]);
        $path = 'storage/frontend/images/icons/';
        ChooseUs::create([
            'title' => $request->title,
            'icon'  => Media::imgUpload($request->icon, $path, 100,100),
            'content' => $request->content
        ]);
        return back()->with('success', 'Choose us section add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChooseUs  $chooseUs
     * @return \Illuminate\Http\Response
     */
    public function show(ChooseUs $chooseUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChooseUs  $chooseUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ChooseUs $chooseUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChooseUs  $chooseUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'icon'  => 'image|mimes:jpg,jpeg,png',
            'content' => 'required'
        ]);
        $chooseUs = ChooseUs::find($id);
        $path = 'storage/frontend/images/icons/';
            if($request->hasFile('icon')){
                if(file_exists($chooseUs->icon)){
                    unlink($chooseUs->icon);
                }
                $chooseUs->update([
                    'icon'  => Media::imgUpload($request->icon, $path, 100,100)
                ]);
            }
        $chooseUs->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return back()->with('success', 'Choose us section Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChooseUs  $chooseUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChooseUs $chooseUs)
    {
        //
    }
}
