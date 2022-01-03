<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UploadController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::get('dashboard', [IndexController::class, 'index']);
        Route::resource('songs', '\App\Http\Controllers\Admin\SongsController');
        Route::resource('links', '\App\Http\Controllers\Admin\LinksController');
        Route::resource('articles', '\App\Http\Controllers\Admin\BlogController');
        Route::resource('tags', '\App\Http\Controllers\Admin\TagsController');
    }
);

Route::delete("/destroy", [UploadController::class, 'delete'])->name("destroy");
Route::post("/admin/upload/{folder}", [UploadController::class, 'store']);

Route::get('/cms', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('cms');
