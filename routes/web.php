<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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
        //Login Routes
Route::get("login",[UserController::class,"login"])->name('login');
Route::post("loginrequest",[UserController::class,"loginrequest"])->name('loginrequest');
Route::get("logout",[UserController::class,"logout"])->name('logout');


// Home Route
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
    Route::get('home',[MainController::class,'index'])->name('home');
});


        //Categories Routes
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
    Route::get('categories',[CategoryController::class,'index'])->name('categories');
    Route::get('categories/create',[CategoryController::class,'create'])->name('categories/create');
    Route::post('categories/store',[CategoryController::class,'store'])->name('categories/store');
    Route::get('categories/edit/{id}',[CategoryController::class,'edit']);
    Route::post('categories/update/{id}',[CategoryController::class,'update']);
    Route::delete('categories/delete/{id}',[CategoryController::class,'destroy'])->name('categories/delete');
});




        //articles Routes
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
    Route::get('articles',[ArticleController::class,'index'])->name('articles');
    Route::get('articles/create',[ArticleController::class,'create'])->name('articles/create');
    Route::post('articles/store',[ArticleController::class,'store'])->name('articles/store');
    Route::get('articles/edit/{id}',[ArticleController::class,'edit'])->name('articles/edit');
    Route::get('articles/show/{id}',[ArticleController::class,'show'])->name('articles/show');
    Route::post('articles/update/{id}',[ArticleController::class,'update'])->name('articles/update');
    Route::delete('articles/delete/{id}',[ArticleController::class,'destroy'])->name('articles/delete');
});

        //users Routes
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
    Route::get('users',[UserController::class,'index'])->name('users');
    Route::get('users/create',[UserController::class,'create'])->name('users/create');
    Route::post('users/store',[UserController::class,'store'])->name('users/store');
    Route::get('users/edit/{id}',[UserController::class,'edit'])->name('users/edit');
    Route::get('users/show/{id}',[UserController::class,'show'])->name('users/show');
    Route::post('users/update/{id}',[UserController::class,'update'])->name('users/update');
    Route::delete('users/delete/{id}',[UserController::class,'destroy'])->name('users/delete');
});

        //Categories Routes
Route::group(['prefix'=>"admin/categories","middleware"=>"auth"],function(){
        Route::get('sub_categories',[SubCategoryController::class,'index'])->name('sub_categories');
        Route::get('sub_category/create',[SubCategoryController::class,'create'])->name('sub_category/create');
        Route::post('sub_category/store',[SubCategoryController::class,'store'])->name('sub_category/store');
        Route::get('sub_category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub_category/edit');
        Route::post('sub_category/update/{id}',[SubCategoryController::class,'update'])->name('sub_category/update');
        Route::delete('sub_category/delete/{id}',[SubCategoryController::class,'destroy'])->name('sub_category/delete');
});