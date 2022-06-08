<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;

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


Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function (){
        Route::get('/', 'HomeController@index')
        ->name('index');
        Route::resource('/posts', "PostController");
    });

Route::get("{any?}", function(){
    return view("guest.home");
})->where("any",".*");

