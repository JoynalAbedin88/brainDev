<?php

namespace App\Http\Controllers;

use App\Models\WorkProcess;
use Illuminate\Http\Request;

class WorkProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['area' => 4, 'page' => 13 ]);
        $process = WorkProcess::all();
        return view('backend.workProcess', compact('process'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'heading' => 'required',
            'content' => 'required',
        ]);

        WorkProcess::create([
            'heading' => $request->heading,
            'content' => $request->content,
        ]);
        return back()->with('success', 'Work Process Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function show(WorkProcess $workProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkProcess $workProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkProcess $workProcess)
    {
        $request->validate([
            'heading' => 'required',
            'content' => 'required',
        ]);

        $workProcess->update([
            'heading' => $request->heading,
            'content' => $request->content,
        ]);
        return back()->with('success', 'Work Process Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkProcess $workProcess)
    {
        //
    }
}
