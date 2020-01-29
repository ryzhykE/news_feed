<?php

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

Route::get('/', 'ArticleController@index')->name('articles');
Route::get('article/{slug}', 'ArticleController@inner')->where(['slug' => '[\pL\pM\pN_-]+'])->name('articles.inner');

Auth::routes();

Route::namespace('Admin')->group(function () {
    Route::group(['middleware' => ['auth']], function() {
        Route::resource('categories', 'CategoryController')->except('show');
        Route::resource('manager', 'ArticleController')->except('show');
    });
});





