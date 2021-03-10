<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Media;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.index');
    }
    public function create()
    {
        $section_1 = Home::where('section', 1)->first();
        $section_2 = Home::where('section', 2)->first();
        $section_3 = Home::where('section', 3)->first();
        return view('backend.createHome', compact('section_1', 'section_2', 'section_3'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "heading" => 'required',
            "upper_pra" => 'required',
            "lower_pra" => 'nullable',
            "first_img" => 'required|image|mimes:jpg,jpeg,png',
            "second_img" => 'image|mimes:jpg,jpeg,png',
            'section'   => 'required',
        ]);
        if($request->hasFile('second_img')){
            $img2 = $this->img2($request);
        }else{
            $img2 = Null;
        }
        Home::create([
            'img_1' => $this->img1($request),
            'img_2' => $img2,
            'heading' => $request->heading,
            'pragraph_1' => $request->upper_pra,
            'pragraph_2' => $request->lower_pra,
            'video' => $request->video,
            'section'  => $request->section,
        ]);

        return back();
    }
    
    public function update(Request $request, $id)
    {
        $home = Home::find($id);
        $request->validate([
            "heading" => 'required',
            "upper_pra" => 'required',
            "lower_pra" => 'nullable',
            "first_img" => 'image|mimes:jpg,jpeg,png',
            "second_img" => 'image|mimes:jpg,jpeg,png',
        ]);
        $path = 'storage/frontend/images/about/';
        if($request->hasFile('first_img')){
            if(file_exists($home->img_1)){
                unlink($home->img_1);
            }
            $home->update([
                'img_1' => $this->img1($request),
            ]);
        }
        if($request->hasFile('second_img')){
            if(file_exists($home->img_2)){
                unlink($home->img_2);
            }
            $home->update([
                'img_2' => $this->img2($request),
            ]);
        }

        $home->update([
            'heading' => $request->heading,
            'pragraph_1' => $request->upper_pra,
            'pragraph_2' => $request->lower_pra,
            'video' => $request->video,
            'section'  => $request->section,
        ]);
        return back();
    }
    private function img1($request){
        $path = 'storage/frontend/images/about/';
        if($request->section == 2 || $request->section == 3){
            $img1 = Media::imgUpload($request->first_img, $path, 478, 352);
        }else{
            $img1 = Media::imgUpload($request->first_img, $path, 324, 405);
        }
        return $img1;
    }
    private function img2($request){
        $path = 'storage/frontend/images/about/';
        if($request->section == 2){
            $img2 = Media::imgUpload($request->second_img, $path, 478, 352);
        }else{
            $img2 = Media::imgUpload($request->second_img, $path, 324, 405);
        }
        return $img2;
    }

}
