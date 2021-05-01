<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguagesController;

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

define('PAGINATION_COUNT',10);
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'auth:admin'],function(){

Route::get('/', 'DashboardController@index')->name('admin.dashboard');

Route::group(['prefix'=>'languages'], function(){

    Route::get('/','LanguagesController@index') -> name('admin.languages');
    Route::get('create','LanguagesController@create') -> name('admin.languages.create');
    Route::post('store','LanguagesController@store') -> name('admin.languages.store');
    Route::get('edit/{id}','LanguagesController@edit') -> name('admin.languages.edit');
    Route::post('update/{id}','LanguagesController@update') -> name('admin.languages.update');
        
    });


Route::group(['prefix'=>'main_categories'], function(){

    Route::get('/','MainCategoriesController@index') -> name('admin.mainCategories');
    Route::get('create','MainCategoriesController@create') -> name('admin.mainCategories.create');
    Route::post('store','MainCategoriesController@store') -> name('admin.mainCategories.store');
    Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.mainCategories.edit');
    Route::post('update/{id}','MainCategoriesController@update') -> name('admin.mainCategories.update');
        
    });

});


Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>'guest:admin'],function(){

    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
});


