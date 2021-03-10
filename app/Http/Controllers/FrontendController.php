<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Home;
use App\Models\Team;
use App\Models\About;
use App\Models\banner;
use App\Models\Project;
use App\Models\Category;
use App\Models\ChooseUs;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $section1 = Home::where('section', 1)->first();
        $section2 = Home::where('section', 2)->first();
        $section3 = Home::where('section', 3)->first();
        $banner = banner::where('status', 1)->get();
        $service = Category::where('what', 2)->where('status', 2)->get();
        $blog = Blog::latest('id');
        return view('frontend.index', compact('blog', 'banner', 'section1', 'section2', 'section3', 'service'));
    }
    public function about()
    {
        $team = Team::where('status', 1)->get();
        $leader = Team::where('status', 2)->get();
        $about = About::all()->first();
        return view('frontend.about', compact('about', 'team', 'leader'));
    }
    public function service($name, $id)
    {
        $choose = ChooseUs::limit(6)->get();
        $category = Category::find(decrypt($id));
    
        return view('frontend.service', compact('name', 'category', 'choose'));
    }
    public function project()
    {
        $category = Category::where('what', 2)->orderBy('name', 'asc')->get();
        $latest = Project::latest('id')->limit(7)->where('category_id', '!=', 0)->get();
        $project = Project::latest('id')->where('category_id', '!=', 0)->get();
        $complete = Project::latest('id')->where('category_id', 0)->get();

        return view('frontend.project', compact('project', 'category', 'latest', 'complete'));
    }

    public function contact()
    {
        
    }
}
