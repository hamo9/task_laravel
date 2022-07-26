<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocalizationController;

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
})->middleware('Locale');

Route::controller(LocalizationController::class)->group(function(){
    Route::get('index','index');
    Route::get('change/lang/{lang}','lang_change')->name('LangChange');
});

Route::get('login',[LoginController::class,'index'])->name('login')->middleware('Locale');
Route::post('submit-login',[LoginController::class,'authenticate'])->middleware('Locale');


Route::group(['middleware' => ['auth', 'admin','Locale']], function () {

    Route::controller(AdminController::class)->group(function(){
        Route::get('dashboard','index');
        Route::post('logout','logout')->name('logout');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('categories','index');
        Route::get('categories/create','create');
        Route::post('categories/store','store');
        Route::get('categories/edit/{id}','edit');
        Route::post('categories/update/{id}','update');
        Route::get('categories/destroy/{id}','destroy');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('products','index');
        Route::get('products/create','create');
        Route::post('products/store','store');
        Route::get('products/edit/{id}','edit');
        Route::post('products/update/{id}','update');
        Route::get('products/destroy/{id}','destroy');
        Route::post('products/filter','filterProduct');

    });


});



