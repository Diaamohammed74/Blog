<?php

use Illuminate\Support\Facades\Route;


        //Login Routes
Route::get("login",'UserController@login')->name('login');
Route::post("loginrequest",'UserController@loginrequest')->name('loginrequest');
Route::get("logout",'UserController@logout')->name('logout');


// Home Route
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
        Route::get('home','MainController@index')->name('home');
});

        //Categories Routes
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
        Route::get('categories','CategoryController@index')->name('categories');
        Route::get('categories/create','CategoryController@create')->name('categories/create');
        Route::post('categories/store','CategoryController@store')->name('categories/store');
        Route::get('categories/edit/{id}','CategoryController@edit')->name('categories/edit');
        Route::post('categories/update/{id}','CategoryController@update')->name('categories/update');
        Route::delete('categories/delete/{id}','CategoryController@destroy')->name('categories/delete');
});


        //articles Routes
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
        Route::get('articles','ArticleController@index')->name('articles');
        Route::get('articles/create','ArticleController@create')->name('articles/create');
        Route::post('articles/store','ArticleController@store')->name('articles/store');
        Route::get('articles/edit/{id}','ArticleController@edit')->name('articles/edit');
        Route::get('articles/show/{id}','ArticleController@show')->name('articles/show');
        Route::post('articles/update/{id}','ArticleController@update')->name('articles/update');
        Route::delete('articles/delete/{id}','ArticleController@destroy')->name('articles/delete');
        Route::get('/subcategories/get', 'ArticleController@getByCategory')->name('subcategories.get');
        Route::get('/autocomplete', 'ArticleController@autocomplete')->name('autocomplete');


});

        //users Routes
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
        Route::get('users','UserController@index')->name('users');
        Route::get('users/create','UserController@create')->name('users/create');
        Route::post('users/store','UserController@store')->name('users/store');
        Route::get('users/edit/{id}','UserController@edit')->name('users/edit');
        Route::get('users/show/{id}','UserController@show')->name('users/show');
        Route::post('users/update/{id}','UserController@update')->name('users/update');
        Route::delete('users/delete/{id}','UserController@destroy')->name('users/delete');
});

        //SubCategories Routes
Route::group(['prefix'=>"admin/categories","middleware"=>"auth"],function(){
        Route::get('sub_categories','SubCategoryController@index')->name('sub_categories');
        Route::get('sub_category/create','SubCategoryController@create')->name('sub_category/create');
        Route::post('sub_category/store','SubCategoryController@store')->name('sub_category/store');
        Route::get('sub_category/edit/{id}','SubCategoryController@edit')->name('sub_category/edit');
        Route::post('sub_category/update/{id}','SubCategoryController@update')->name('sub_category/update');
        Route::delete('sub_category/delete/{id}','SubCategoryController@destroy')->name('sub_category/delete');
});
        //Tags Routes
Route::group(['prefix'=>"admin","middleware"=>"auth"],function(){
        Route::get('tags','TagsController@index')->name('tags');
        Route::get('tag/create','TagsController@create')->name('tag/create');
        Route::post('tag/store','TagsController@store')->name('tag/store');
        Route::get('tag/edit/{id}','TagsController@edit')->name('tag/edit');
        Route::post('tag/update/{id}','TagsController@update')->name('tag/update');
        Route::delete('tag/delete/{id}','TagsController@destroy')->name('tag/delete');
});