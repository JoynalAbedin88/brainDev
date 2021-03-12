<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChooseUsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ServiceContentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WorkProcessController;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::prefix('admin')->middleware('auth')->group(function () {      // All Route for Admin
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'blog'          => BlogController::class,
        'category'      => CategoryController::class,
        'comment'       => CommentController::class,
        'reply'         => ReplyController::class,
        'like'          => LikeController::class,
        'about'         => AboutController::class,
        'team'          => TeamController::class,
        'service'       => ServiceController::class,
        'choose'        => ChooseUsController::class,
        'service_content'=> ServiceContentController::class,
        'project'       => ProjectController::class,
        'banner'        => BannerController::class,
        'work-process'  => WorkProcessController::class,
        'contact'       => ContactController::class,
        'sponsor'       => SponsorController::class,
    ]);
    
    Route::get('home/create', [HomeController::class, 'create'])->name('home.create');
    Route::post('home/store', [HomeController::class, 'store'])->name('home.store');
    Route::put('home/update/{id}', [HomeController::class, 'update'])->name('home.update');
    
    Route::get('trush', [BlogController::class, 'trush'])->name('blog.trush');
    Route::put('restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');
    Route::put('forceDelete/{id}', [BlogController::class, 'forceDelete'])->name('blog.forceDelete');
    Route::get('messages', [ContactController::class, 'message'])->name('contact.message');
});

// All Route for Public

Route::get( '/', [FrontendController::class, 'index'])->name('front.index');
Route::get( 'about', [FrontendController::class, 'about'])->name('front.about');
Route::get( 'service/{name}/{id}', [FrontendController::class, 'service'])->name('front.service');
Route::get( 'project', [FrontendController::class, 'project'])->name('front.project');
Route::get( 'contact', [FrontendController::class, 'contact'])->name('front.contact');

Route::get( 'blog', [FrontendController::class, 'blog'])->name('front.blog');
Route::get( 'blog/category/{id}', [FrontendController::class, 'blog'])->name('front.blog.category');
Route::get( 'blog/{slug}/{id}', [FrontendController::class, 'blogShow'])->name('front.blog.show');

Route::post('message', [ContactController::class, 'postMessage'])->name('contact.message.post');

