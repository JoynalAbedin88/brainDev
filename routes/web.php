<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChooseUsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ServiceContentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Models\Project;
use App\Models\ServiceContent;
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
    ]);

    Route::get('home/create', [HomeController::class, 'create'])->name('home.create');
    Route::post('home/store', [HomeController::class, 'store'])->name('home.store');
    Route::put('home/update/{id}', [HomeController::class, 'update'])->name('home.update')
    ;
    Route::get('posts', [BlogController::class, 'allPost'])->name('blog.allpost');
    Route::get('trush', [BlogController::class, 'trush'])->name('blog.trush');
    Route::put('restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');
    Route::put('forceDelete/{id}', [BlogController::class, 'forceDelete'])->name('blog.forceDelete');

    Route::get('service/page/design', [PageController::class, 'serviceDesign'])->name('service.design');
    Route::get('about/page/design', [PageController::class, 'adoutDesign'])->name('about.design');
    Route::post('page/store', [PageController::class, 'store'])->name('page.store');
    Route::put('page/{id}', [PageController::class, 'update'])->name('page.update');
});

// All Route for Public

Route::get( '/', [FrontendController::class, 'index'])->name('front.index');
Route::get( 'about', [FrontendController::class, 'about'])->name('front.about');
Route::get( 'service/{name}/{id}', [FrontendController::class, 'service'])->name('front.service');
Route::get( 'project', [FrontendController::class, 'project'])->name('front.project');
Route::get( 'contact', [FrontendController::class, 'contact'])->name('front.contact');

Route::get( 'blog', [BlogController::class, 'index'])->name('blog.index');
Route::get( 'blog/category/{id}', [BlogController::class, 'index'])->name('blog.index.category');
Route::get( 'blog/{slug}/{id}', [BlogController::class, 'show'])->name('blog.show');

