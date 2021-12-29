<?php

use App\Http\Controllers\Admin\IndexController;
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
        // Route::resource('products', '\App\Http\Controllers\Admin\ProductController');
    }
);

Route::get('/cms', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('cms');
