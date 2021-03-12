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
use App\Models\ContactInfo;
use App\Models\Sponsor;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $section1   = Home::where('section', 1)->first();
        $section2   = Home::where('section', 2)->first();
        $section3   = Home::where('section', 3)->first();
        $banner     = banner::where('status', 1)->get();
        $process    = WorkProcess::all();
        $service    = Category::where('what', 2)->where('status', 2)->get();
        $blog       = Blog::latest('id');
        $sponsor    = Sponsor::latest('id')->get();

        return view('frontend.index', compact('blog', 'banner', 'section1', 'section2', 'section3', 'service', 'process', 'sponsor'));
    }
    public function about()
    {
        $banner     = $this->page('about');
        $team       = Team::where('status', 1)->get();
        $leader     = Team::where('status', 2)->get();
        $about      = About::all()->first();
        
        return view('frontend.about', compact('about', 'team', 'leader', 'banner'));
    }
    public function service($name, $id)
    {
        $banner     = $this->page('service');
        $choose     = ChooseUs::limit(6)->get();
        $category   = Category::find(decrypt($id));
    
        return view('frontend.service', compact('name', 'category', 'choose', 'banner'));
    }
    public function project()
    {
        $banner     = $this->page('project');
        $category   = Category::where('what', 2)->orderBy('name', 'asc')->get();
        $latest     = Project::latest('id')->limit(7)->where('category_id', '!=', 0)->get();
        $project    = Project::latest('id')->where('category_id', '!=', 0)->get();
        $complete   = Project::latest('id')->where('category_id', 0)->get();

        return view('frontend.project', compact('project', 'category', 'latest', 'complete', 'banner'));
    }

    public function blog($id = '')
    {
        $banner     = $this->page('blog');
        $searchKey  = $_GET['search'] ?? Null;
        $query      = Blog::latest('id');
        $category   = Category::orderBy('name', 'asc')->where('what', 1)->get();

        if($id != Null){
            $blog = $query->where('category_id', decrypt($id))->get();
        }elseif($searchKey){
            $blog = $query->where('title', 'like', "%{$searchKey}%")->get();
        }
        else{
            $blog = $query->get();
        }

        return view('frontend.blog', compact('blog', 'category', 'query', 'banner'));
    }

    public function blogShow($slug, $id)
    {
        $banner     = $this->page('blog');
        $save       = null;
        $blog       = Blog::where('slug', $slug)->where('id', decrypt($id))->first();
        $category   = Category::orderBy('name', 'asc')->where('what', 1)->get();
        $recent     = Blog::latest('id');

        if(Auth::user()){
            if(Auth::user()->comment->last()){
                $save = Auth::user()->comment->last();
            }
        }

        return view('frontend.singleBlog', compact('blog', 'category', 'recent', 'save', 'banner'));
    }

    public function contact()
    {
        $sponsor    = Sponsor::latest('id')->get();
        $banner     = $this->page('contact');
        $contact    = ContactInfo::all()->first();

        return view('frontend.contact', compact('contact', 'banner', 'sponsor'));   
    }

    private function page($page)
    {
        return banner::where('heading', 'like', "%{$page}%")->first();
    }
}
