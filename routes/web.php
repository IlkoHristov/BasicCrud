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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('articles', 'ArticleController');
Route::post('/create','ArticleController@createArticle');
Route::post('/view','ArticleController@getArticle');
Route::post('/edit','ArticleController@editArticle');
Route::post('/delete','ArticleController@deleteArticle');

