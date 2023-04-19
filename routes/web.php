<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;

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

Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
Route::get('/create','ProductController@create')->name('create');
Route::post('store/','ProductController@store')->name('store');
Route::get('show/{product}','ProductController@show')->name('show');
Route::get('edit/{product}','ProductController@update')->name('update');
Route::put('edit/{product}','ProductController@index')->name('index');
Route::delete('/[product]','ProductController@destroy')->name('destroy');