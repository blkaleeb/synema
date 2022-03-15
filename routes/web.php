<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SongsController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Client\PageController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home']);

Route::get('home', [PageController::class, 'home']);

Route::get('songs/{group}', [PageController::class, 'song']);
Route::get('song-item/{id}', [PageController::class, 'songShow']);

Route::get('blog', [PageController::class, 'blog']);
Route::get('blog-item/{id}', [PageController::class, 'blogShow']);

Route::get('artist-detail/{id}', [PageController::class, 'artistShow']);

Route::get('contact', function () {
    return view('client.contact');
});

Route::get('about', function () {
    return view('client.about');
});

Route::get('blog-item', function () {
    return view('client.blog-item');
});

Route::get('songs-item', function () {
    return view('client.songs-item');
});

Route::post('/subscribe', [SubscribeController::class, 'store']);

//Comments Section
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

Auth::routes();

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::get('/', [IndexController::class, 'index']);
        Route::resource('songs', '\App\Http\Controllers\Admin\SongsController');
        Route::resource('links', '\App\Http\Controllers\Admin\LinksController');
        Route::resource('articles', '\App\Http\Controllers\Admin\BlogController');
        Route::resource('tags', '\App\Http\Controllers\Admin\TagsController');
        Route::resource('compro', '\App\Http\Controllers\Admin\ComproController');
        Route::resource('article_category', '\App\Http\Controllers\Admin\ArticleCategoryController');
        Route::resource('email', '\App\Http\Controllers\Admin\SubscribeController');
        Route::resource('banners', '\App\Http\Controllers\Admin\BannerController');
        Route::resource('artists', '\App\Http\Controllers\Admin\ArtistsController');
        Route::resource('tree', '\App\Http\Controllers\Admin\TreeController');
    }
);

Route::delete("/destroy", [UploadController::class, 'delete'])->name("destroy");
Route::post("/admin/upload/{folder}", [UploadController::class, 'store']);

Route::get('cms', function () {
    return redirect('admin/songs');
});

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.token');
