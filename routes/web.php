<?php

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
    $product=\App\Models\Product::all();
    return view('welcome')->with('products',$product);
})->name('index');
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/create', 'App\Http\Controllers\ProductController@create')->name('create');
Route::post('/store', 'App\Http\Controllers\ProductController@store')->name('store');
//Route::get('/index', 'App\Http\Controllers\ProductController@index')->name('index');
Route::get('/edit/{id}', 'App\Http\Controllers\ProductController@edit')->name('edit');
Route::get('/destroy/{id}', 'App\Http\Controllers\ProductController@destroy')->name('destroy');