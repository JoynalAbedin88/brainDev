<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::where('status', 1)->get();
        $leader = Team::where('status', 2)->get();
        $all = Team::all();
        return view('backend.team', compact('team', 'leader', 'all'));
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
            "name" => 'required',
            "designation" => 'required',
            "leader" => "nullable",
            "image" => 'required|image|mimes:jpg,jprg,png,svg',
        ]);
        $path = 'storage/frontend/images/team/';
        Team::create([
            'name' => $request->name,
            'image' => Media::imgUpload($request->image, $path, 300, 300),
            'designation' => $request->designation,
            'status' => $request->leader ? 2 : 1,
        ]);
        return back()->with('success', 'Memder App Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            "name" => 'required',
            "designation" => 'required',
            "leader" => "nullable",
            "image" => 'nullable|image|mimes:jpg,jprg,png,svg',
        ]);
        $path = 'storage/frontend/images/team/';
        if($request->hasFile('image')){
            if(file_exists($team->image)){
                unlink($team->image);
            }
            $team->update([
                'image' => Media::imgUpload($request->image, $path, 300, 300),
            ]);
        }
        $team->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'status' => $request->leader ? 2 : 1,
        ]);
        return back()->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
