<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
Route::get('/','ProductController@dashboard')->name('index');
// Route::get('/create','ProductController@create')->name('create');
// Route::post('store/','ProductController@store')->name('store');
// Route::get('show/{product}','ProductController@show')->name('show');
// Route::get('edit/{product}','ProductController@update')->name('update');
// Route::put('edit/{product}','ProductController@index')->name('index');
// Route::delete('/[product]','ProductController@destroy')->name('destroy');
// Route::get('/search','ProductController@search');
// Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
// Route::get('cart', [ProductController::class, 'cart'])->name('cart');

// Route::get('/create','CategoryController@create')->name('create');
// Route::post('store/','CategoryController@store')->name('store');
// Route::get('show/{category}','CategoryController@show')->name('show');
// Route::get('edit/{category}','CategoryController@update')->name('update');
// Route::put('edit/{category}','CategoryController@index')->name('index');
// Route::delete('/[category]','CategoryController@destroy')->name('destroy');

Route::get('cart',[CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
// Route::post('cart/{id}','CartController@store')->name('cart.store');

Route::get('/orders', [OrderController::class, 'store'])->name('orders.store');

Auth::routes();

Route::get('/products', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('profile',ProfileController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('store/','ProductController@store')->name('store');
    Route::get('show/{product}','ProductController@show')->name('show');
    Route::get('edit/{product}','ProductController@update')->name('update');
    Route::put('edit/{product}','ProductController@index')->name('index');
    Route::delete('/[product]','ProductController@destroy')->name('destroy');
    Route::get('/search','ProductController@search');

    Route::get('/create','CategoryController@create')->name('create');
    Route::post('store/','CategoryController@store')->name('store');
    Route::get('show/{category}','CategoryController@show')->name('show');
    Route::get('edit/{category}','CategoryController@update')->name('update');
    Route::put('edit/{category}','CategoryController@index')->name('index');
    Route::delete('/[category]','CategoryController@destroy')->name('destroy');
});


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
