<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/brand','App\Http\Controllers\BrandController@index')->name('brand.index');
// Route::get('/brand/create','App\Http\Controllers\BrandController@create')->name('brand.create');
// Route::post('/brand','App\Http\Controllers\BrandController@store')->name('brand.store');
// Route::get('/brand/{brand}/edit','App\Http\Controllers\BrandController@edit')->name('brand.edit');
// Route::put('/brand/{brand}/update','App\Http\Controllers\BrandController@update')->name('brand.update');
// Route::delete('/brand/{brand}/destroy','App\Http\Controllers\BrandController@destroy')->name('brand.destroy');

//Category routes
Route::get('/category','App\Http\Controllers\CategoryController@index')->name('category.index');
// Route::get('/category/create','App\Http\Controllers\CategoryController@create')->name('category.create');
// Route::post('/category','App\Http\Controllers\CategoryController@store')->name('category.store');
// Route::get('/category/{category}/edit','App\Http\Controllers\CategoryController@edit')->name('category.edit');
// Route::put('/category/{category}/update','App\Http\Controllers\CategoryController@update')->name('category.update');
// Route::delete('/category/{category}/destroy','App\Http\Controllers\CategoryController@destroy')->name('category.destroy');

//Product routes
// Route::get('/product','App\Http\Controllers\ProductController@index')->name('product.index');
// Route::get('/product/create','App\Http\Controllers\ProductController@create')->name('product.create');
// Route::post('/product','App\Http\Controllers\ProductController@store')->name('product.store');
// Route::get('/product/{product}/edit','App\Http\Controllers\ProductController@edit')->name('product.edit');
// Route::put('/product/{product}/update','App\Http\Controllers\ProductController@update')->name('product.update');
// Route::delete('/product/{product}/destroy','App\Http\Controllers\ProductController@destroy')->name('product.destroy');

Auth::routes();

Route::middleware(['auth','user-role:userR'])->group(function()
{
    Route::get("/user/home",[App\Http\Controllers\HomeController::class, 'userHome'])->name("user.home");
    Route::get('/user/brand','App\Http\Controllers\BrandController@index')->name('brand.index');
    Route::get('/user/category','App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('/user/product','App\Http\Controllers\ProductController@index')->name('product.index');
    Route::get('/user/order','App\Http\Controllers\OrderController@index')->name('order.index');
});
// Route Editor
Route::middleware(['auth','user-role:userCR'])->group(function()
{
    Route::get("/userCR/home",[App\Http\Controllers\HomeController::class, 'editorHome'])->name("editor.home");

    //Brand
    Route::get('/userCR/brand','App\Http\Controllers\BrandController@index')->name('brand.index');
    Route::get('/userCR/brand/create','App\Http\Controllers\BrandController@create')->name('cr.brand.create');
    Route::post('/userCR/brand','App\Http\Controllers\BrandController@store')->name('cr.brand.store');

    //Category
    Route::get('/userCR/category','App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('/userCR/category/create','App\Http\Controllers\CategoryController@create')->name('cr.category.create');
    Route::post('/userCR/category','App\Http\Controllers\CategoryController@store')->name('cr.category.store');

    //Product
    Route::get('/userCR/product','App\Http\Controllers\ProductController@index')->name('product.index');
    Route::get('/userCR/product/create','App\Http\Controllers\ProductController@create')->name('cr.product.create');
    Route::post('/userCR/product','App\Http\Controllers\ProductController@store')->name('cr.product.store');

    //Order
    Route::get('/userCR/order','App\Http\Controllers\OrderController@index')->name('order.index');
    Route::get('/userCR/order/create','App\Http\Controllers\OrderController@create')->name('cr.order.create');
    Route::post('/userCR/order','App\Http\Controllers\OrderController@store')->name('cr.order.store');
});
// Route Admin
Route::middleware(['auth','user-role:userCRUD'])->group(function()
{
    //Brand
    Route::get("/userCRUD/home",[App\Http\Controllers\HomeController::class, 'adminHome'])->name("admin.home");
    Route::get('/userCRUD/brand','App\Http\Controllers\BrandController@index')->name('brand.index');
    Route::get('/userCRUD/brand/create','App\Http\Controllers\BrandController@create')->name('brand.create');
    Route::post('/userCRUD/brand','App\Http\Controllers\BrandController@store')->name('brand.store');
    Route::get('/userCRUD/brand/{brand}/edit','App\Http\Controllers\BrandController@edit')->name('brand.edit');
    Route::put('/userCRUD/brand/{brand}/update','App\Http\Controllers\BrandController@update')->name('brand.update');
    Route::delete('/userCRUD/brand/{brand}/destroy','App\Http\Controllers\BrandController@destroy')->name('brand.destroy');

    //Category
    Route::get('/userCRUD/category','App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('/userCRUD/category/create','App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::post('/userCRUD/category','App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::get('/userCRUD/category/{category}/edit','App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::put('/userCRUD/category/{category}/update','App\Http\Controllers\CategoryController@update')->name('category.update');
    Route::delete('/userCRUD/category/{category}/destroy','App\Http\Controllers\CategoryController@destroy')->name('category.destroy');

    //Product routes
    Route::get('/userCRUD/product','App\Http\Controllers\ProductController@index')->name('product.index');
    Route::get('/userCRUD/product/create','App\Http\Controllers\ProductController@create')->name('product.create');
    Route::post('/userCRUD/product','App\Http\Controllers\ProductController@store')->name('product.store');
    Route::get('/userCRUD/product/{product}/edit','App\Http\Controllers\ProductController@edit')->name('product.edit');
    Route::put('/userCRUD/product/{product}/update','App\Http\Controllers\ProductController@update')->name('product.update');
    Route::delete('/userCRUD/product/{product}/destroy','App\Http\Controllers\ProductController@destroy')->name('product.destroy');

    //Order
    Route::get('/userCRUD/order','App\Http\Controllers\OrderController@index')->name('order.index');
    Route::get('/userCRUD/order/create','App\Http\Controllers\OrderController@create')->name('order.create');
    Route::post('/userCRUD/order','App\Http\Controllers\OrderController@store')->name('order.store');
    Route::get('/userCRUD/order/{order}/edit','App\Http\Controllers\OrderController@edit')->name('order.edit');
    Route::put('/userCRUD/order/{order}/update','App\Http\Controllers\OrderController@update')->name('order.update');
    Route::delete('/userCRUD/order/{order}/destroy','App\Http\Controllers\OrderController@destroy')->name('order.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
