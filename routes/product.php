<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('admin/products')->middleware('auth:admin')->group(function(){

    Route::controller(ProductController::class)->group(function(){
        Route::get('/','index')->name('admin.products');
        Route::get('create','create')->name('products/create');
        Route::post('store','store');
        Route::get('/edit/{id}','edit');
        Route::post('update','update');
        Route::get('/delete/{id}','destroy');
        Route::post('/deletegroup','deletegroup');
        Route::get('/restore/{id}','restore');
        Route::get('/forcedelte/{id}','forcedelete');
        Route::get('/deleted','deleted');

    });
});

Route::prefix('admin/categories')->middleware('auth:admin')->group(function(){
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/','index');
        Route::get('/catProduct/{id}','products');
        Route::get('/catProduct2/{id}{start}{end}','products2');
        Route::get('create','create')->name('categories/create');
        Route::post('store','store');
    });
});
Route::prefix('admin/reports')->middleware('auth:admin')->group(function(){
    Route::controller(ReportController::class)->group(function(){
        Route::get('/','index');
        Route::post('filter','filter');
        Route::get('charts','index2');
    });
});
